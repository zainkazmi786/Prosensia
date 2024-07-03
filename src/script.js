document.addEventListener('DOMContentLoaded', () => {
    // Function to load the side panel
    function loadSidePanel() {
        fetch('sidepanel.html')
            .then(response => response.text())
            .then(data => {
                document.getElementById('side-panel-container').innerHTML = data;

                // Initialize the toggle buttons after loading the side panel
                const buttons = document.querySelectorAll('.toggle-button');
                const sections = document.querySelectorAll('.hero-section');

                buttons.forEach(button => {
                    button.addEventListener('click', (event) => {
                        event.preventDefault();
                        const targetId = button.getAttribute('data-target');
                        // button.style.backgroundColor = "yellow";
                        button.style.color = "yellow";
                        button.style.fontSize = "larger";

                        // Hide all sections
                        sections.forEach(section => section.classList.add('hidden'));

                        // Show the targeted section
                        const targetSection = document.getElementById(targetId);
                        if (targetSection) {
                            targetSection.classList.remove('hidden');
                        }

                        // Reset the background color and text color of all other buttons
                        buttons.forEach(btn => {
                            if (btn !== button) {
                                btn.style.color = "";
                                btn.style.fontSize = "";
                            }
                        });
                    });
                });
            })
            .catch(error => console.error('Error loading side panel:', error));
    }

    // Load the side panel on page load
    loadSidePanel();
});
