/**
 * Runway Task Polling for Frontend
 * Auto-checks task status and updates UI when tasks complete
 */

class RunwayTaskPoller {
    constructor(options = {}) {
        this.pollInterval = options.pollInterval || 5000; // 5 seconds
        this.maxAttempts = options.maxAttempts || 60; // 5 minutes
        this.activeTasks = new Map();
        this.isPolling = false;
    }

    /**
     * Start polling for a specific task
     */
    addTask(entityId, taskId, onUpdate = null, onComplete = null, onError = null) {
        console.log(`Runway Polling: Adding task ${entityId}`);
        
        this.activeTasks.set(entityId, {
            taskId,
            attempts: 0,
            onUpdate,
            onComplete,
            onError,
            addedAt: Date.now()
        });

        this.startPolling();
    }

    /**
     * Remove task from polling
     */
    removeTask(entityId) {
        this.activeTasks.delete(entityId);
        if (this.activeTasks.size === 0) {
            this.stopPolling();
        }
    }

    /**
     * Start the polling loop
     */
    startPolling() {
        if (this.isPolling) return;
        
        this.isPolling = true;
        console.log('Runway Polling: Started');
        this.poll();
    }

    /**
     * Stop the polling loop
     */
    stopPolling() {
        this.isPolling = false;
        console.log('Runway Polling: Stopped');
    }

    /**
     * Main polling function
     */
    async poll() {
        if (!this.isPolling || this.activeTasks.size === 0) {
            this.isPolling = false;
            return;
        }

        for (const [entityId, task] of this.activeTasks) {
            task.attempts++;

            // Stop if max attempts reached
            if (task.attempts > this.maxAttempts) {
                console.log(`Runway Polling: Max attempts reached for task ${entityId}`);
                if (task.onError) {
                    task.onError('Polling timeout - task may still be processing');
                }
                this.removeTask(entityId);
                continue;
            }

            try {
                await this.checkTaskStatus(entityId, task);
            } catch (error) {
                console.error(`Runway Polling: Error checking task ${entityId}:`, error);
                if (task.onError) {
                    task.onError(error.message);
                }
            }
        }

        // Schedule next poll
        if (this.isPolling && this.activeTasks.size > 0) {
            setTimeout(() => this.poll(), this.pollInterval);
        } else {
            this.isPolling = false;
        }
    }

    /**
     * Check status of a specific task
     */
    async checkTaskStatus(entityId, task) {
        const response = await fetch(`/admin/runway/check-task/${entityId}`, {
            method: 'GET',
            headers: {
                'Accept': 'application/json',
                'X-Requested-With': 'XMLHttpRequest'
            }
        });

        if (!response.ok) {
            throw new Error(`HTTP ${response.status}: ${response.statusText}`);
        }

        const data = await response.json();

        if (data.error) {
            throw new Error(data.error);
        }

        console.log(`Runway Polling: Task ${entityId} status:`, data.entity_state);

        // Update UI
        if (task.onUpdate) {
            task.onUpdate(data);
        }

        // Check if completed
        if (data.entity_state === 'completed' && data.output_file) {
            console.log(`Runway Polling: Task ${entityId} completed!`);
            if (task.onComplete) {
                task.onComplete(data);
            }
            this.removeTask(entityId);
        } else if (data.entity_state === 'failed') {
            console.log(`Runway Polling: Task ${entityId} failed`);
            if (task.onError) {
                task.onError('Task failed');
            }
            this.removeTask(entityId);
        }
    }
}

// Global instance
window.runwayPoller = new RunwayTaskPoller();

// Auto-start polling for existing Runway tasks
document.addEventListener('DOMContentLoaded', function() {
    // Look for Runway tasks in the page
    const runwayTasks = document.querySelectorAll('[data-runway-entity-id]');
    
    runwayTasks.forEach(element => {
        const entityId = element.dataset.runwayEntityId;
        const taskId = element.dataset.runwayTaskId;
        const state = element.dataset.state;
        
        if (state === 'queued' || state === 'processing') {
            console.log(`Auto-starting polling for Runway task: ${entityId}`);
            
            window.runwayPoller.addTask(
                entityId,
                taskId,
                // onUpdate
                (data) => {
                    element.dataset.state = data.entity_state;
                    
                    // Update progress indicator
                    const progressElement = element.querySelector('.progress-indicator');
                    if (progressElement) {
                        if (data.entity_state === 'processing') {
                            progressElement.textContent = 'Processing...';
                        } else if (data.entity_state === 'queued') {
                            progressElement.textContent = 'Queued...';
                        }
                    }
                },
                // onComplete
                (data) => {
                    console.log('Task completed:', data);
                    
                    // Reload the page to show the result
                    if (window.location.href.includes('/library') || window.location.href.includes('/imagine')) {
                        window.location.reload();
                    }
                },
                // onError
                (error) => {
                    console.error('Task error:', error);
                    
                    const progressElement = element.querySelector('.progress-indicator');
                    if (progressElement) {
                        progressElement.textContent = 'Error: ' + error;
                        progressElement.style.color = 'red';
                    }
                }
            );
        }
    });
});

console.log('Runway Task Polling script loaded');
