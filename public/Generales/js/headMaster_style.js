
    document.addEventListener('DOMContentLoaded', function() {
        var options = {
            strings: ["Détendez-vous et profitez de votre séjour", "Explorez la région et découvrez de nouvelles choses"],
            typeSpeed: 150, // Augmentez la valeur pour ralentir la frappe
            backSpeed: 100, // Augmentez la valeur pour ralentir la suppression
            loop: true,
            showCursor: true,
            cursorChar: '|',
            callback: function() {
                $(".typed-h3").css("color", "orange"); // Change la couleur en orange après l'animation
            }
        };

        var typed = new Typed('.typed-h1', options);
    });

   