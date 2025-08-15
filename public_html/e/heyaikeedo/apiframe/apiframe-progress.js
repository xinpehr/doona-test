// APIFrame Progress Monitoring
// Monitors processing APIFrame entities and shows real-time progress updates

document.addEventListener('alpine:init', () => {
    // Extend the imagine component to show APIFrame progress
    Alpine.data('imagine', (model, services = [], samples = [], image = null) => {
        // Get the original imagine data if it exists
        const originalData = window.imagineView ? window.imagineView(model, services, samples, image) : {};
        
        return {
            ...originalData,
            
            checkProgress() {
                if (!this.preview || this.preview.state >= 3) {
                    return;
                }

                // Check if this is an APIFrame model
                const isApiFrame = this.preview.model && this.preview.model.startsWith('apiframe/');
                
                if (isApiFrame) {
                    console.log(`APIFrame: Checking progress for entity ${this.preview.id}`);
                    
                    // Use standard endpoint but check for APIFrame metadata
                    api.get(`/library/images/${this.preview.id}`)
                        .then(response => response.json())
                        .then(data => {
                            console.log('APIFrame: Entity data:', data);
                            
                            // Update the preview
                            this.preview = data;
                            
                            // Continue polling if still processing
                            if (data.state === 2) { // PROCESSING state
                                setTimeout(() => this.checkProgress(), 3000); // Poll every 3 seconds
                            }
                        })
                        .catch(error => {
                            console.error('APIFrame: Error checking progress:', error);
                            // Retry after longer delay on error
                            setTimeout(() => this.checkProgress(), 10000);
                        });
                } else {
                    // For non-APIFrame models, use standard polling
                    api.get(`/library/images/${this.preview.id}`)
                        .then(response => response.json())
                        .then(data => {
                            this.preview = data;
                            if (data.state < 3) {
                                setTimeout(() => this.checkProgress(), 5000);
                            }
                        })
                        .catch(error => {
                            console.error('Error checking progress:', error);
                        });
                }
            },
            
            // Show progress percentage for APIFrame
            getProgressText() {
                if (this.preview && this.preview.model && this.preview.model.startsWith('apiframe/')) {
                    const progress = this.preview.progress || 0;
                    if (progress > 0) {
                        return `${progress}%`;
                    }
                    return 'Initializing...';
                }
                return originalData.getProgressText ? originalData.getProgressText.call(this) : 'Processing...';
            }
        };
    });
    
    console.log('APIFrame: Progress monitoring loaded');
});