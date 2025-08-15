// APIFrame Polling Extension
// Extends the standard imagine component to handle APIFrame-specific polling

document.addEventListener('alpine:init', () => {
    // Store original imagine function
    const originalImagine = window.imagineView ? window.imagineView() : null;
    
    if (!originalImagine) {
        console.error('APIFrame: Original imagine component not found');
        return;
    }
    
    // Override the imagine Alpine data
    Alpine.data('imagine', (model, services = [], samples = [], image = null) => {
        const originalData = originalImagine(model, services, samples, image);
        
        return {
            ...originalData,
            
            checkProgress() {
                if (this.preview.state >= 3) {
                    return;
                }

                // Check if this is an APIFrame model
                const isApiFrame = this.preview.model && this.preview.model.startsWith('apiframe/');
                
                const endpoint = isApiFrame 
                    ? `/apiframe/status/${this.preview.id}`
                    : `/library/images/${this.preview.id}`;
                
                console.log(`APIFrame: Checking progress for ${this.preview.id} using endpoint: ${endpoint}`);
                
                api.get(endpoint)
                    .then(response => response.json())
                    .then(data => {
                        if (isApiFrame) {
                            // APIFrame endpoint returns different structure
                            console.log('APIFrame: Received status:', data);
                            
                            // Map APIFrame status to standard entity state
                            const statusMap = {
                                'processing': 2, // PROCESSING
                                'completed': 3,  // COMPLETED
                                'failed': 4      // FAILED
                            };
                            
                            this.preview.state = statusMap[data.status] || this.preview.state;
                            this.preview.progress = data.progress || 0;
                            
                            if (data.completed) {
                                console.log('APIFrame: Task completed, refreshing entity data');
                                // Refresh the entity from main endpoint to get full data
                                api.get(`/library/images/${this.preview.id}`)
                                    .then(response => response.json())
                                    .then(image => {
                                        console.log('APIFrame: Refreshed entity:', image);
                                        this.preview = image;
                                    })
                                    .catch(error => {
                                        console.error('APIFrame: Error refreshing entity:', error);
                                    });
                            } else if (!data.failed && data.status === 'processing') {
                                // Continue polling every 3 seconds for APIFrame
                                setTimeout(() => this.checkProgress(), 3000);
                            } else if (data.failed) {
                                console.error('APIFrame: Task failed:', data.failure_reason);
                                this.preview.state = 4; // FAILED state
                            }
                        } else {
                            // Standard endpoint - call original logic
                            this.preview = data;
                            setTimeout(() => this.checkProgress(), 5000);
                        }
                    })
                    .catch(error => {
                        console.error('APIFrame: Error checking progress:', error);
                        // Fallback to standard endpoint
                        if (isApiFrame) {
                            api.get(`/library/images/${this.preview.id}`)
                                .then(response => response.json())
                                .then(image => {
                                    this.preview = image;
                                    setTimeout(() => this.checkProgress(), 5000);
                                })
                                .catch(fallbackError => {
                                    console.error('APIFrame: Fallback also failed:', fallbackError);
                                });
                        }
                    });
            }
        };
    });
    
    console.log('APIFrame: Polling extension loaded');
});
