document.addEventListener('DOMContentLoaded', () => {
    // Function to load the side panel
    function main() {
      

                // Initialize the toggle buttons after loading the side panel
                const buttons = document.querySelectorAll('.toggle-button');
                const sections = document.querySelectorAll('.hero-section');

                buttons.forEach(button => {
                    button.addEventListener('click', (event) => {
                        event.preventDefault();
                        const targetId = button.getAttribute('data-target');
                        
                        // Hide all sections
                        sections.forEach(section => section.classList.add('hidden'));
                        
                        // Show the targeted section
                        const targetSection = document.getElementById(targetId);
                        if (targetSection) {
                            targetSection.classList.remove('hidden');
                        }

                        // Reset the style of all buttons
                        buttons.forEach(btn => {
                            btn.style.color = "";
                            btn.style.fontSize = "";
                        });

                        // Set the style of the clicked button
                        button.style.color = "yellow";
                        button.style.fontSize = "larger";
                    });
                });

                // Set the style of the current page's button
                const url = window.location.href;
                const currentPage = url.substring(url.lastIndexOf('/') + 1);
                console.log(currentPage); // Outputs "Courses.html"

                
                const currentButton = document.querySelector(`a[href="${currentPage}"]`);
                console.log(currentButton)
                if (currentButton) {
                    currentButton.style.color = "yellow";
                    currentButton.style.fontSize = "larger";
                    
                    // Show the corresponding section
                    const targetId = currentButton.getAttribute('data-target');
                    const targetSection = document.getElementById(targetId);
                    if (targetSection) {
                        targetSection.classList.remove('hidden');
                    }
                }
           
            
    }

    // Load the side panel on page load
     main();
});
