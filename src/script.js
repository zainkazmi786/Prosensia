document.addEventListener('DOMContentLoaded', () => {
    const buttons = document.querySelectorAll('.toggle-button');
    const sections = document.querySelectorAll('.hero-section');

    buttons.forEach(button => {
        button.addEventListener('click', (event) => {
            event.preventDefault();
            const targetId = button.getAttribute('data-target');
            // button.style.backgroundColor = "yellow";
            button.style.color = "yellow";
            
            
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
                    // btn.style.backgroundColor = "";
                    btn.style.color = "";
                    button.style.fontSize = "";
                }
            });
        });
    });
});
