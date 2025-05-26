
<header class="siws-header">
    <!-- Top Header Menu -->
    <div class="top-header-menu-container">
        <div class="siws-container top-menu-style">
            <?php
                if (has_nav_menu('top_header_menu')) {
                    wp_nav_menu(array(
                        'theme_location' => 'top_header_menu', // Registered location for the top header menu
                        'container'      => 'nav',            // Wrap menu in a <nav> element
                        'container_class' => 'top-header-nav', // Class for the container
                        'menu_class'     => 'top-header-menu', // Class for the <ul> element
                        'fallback_cb'    => false,            // Disable fallback if no menu is assigned
                    ));
                } else {
                    echo '<p style="margin: 0; padding: 0;">Please assign the Top Header Menu in the WordPress admin panel.</p>';
                }
            ?>
        </div>
    </div>

    <style>
        span.siws {
    color: #002060;
    font-size: 50px;
    font-family: 'Times New Roman OS Bold ';
    font-weight: bold;
}
        .header-text {
    color: #002060;
    line-height: normal;
}

span.swamy-line {
    color: #002060;
    font-weight: 700;
    font-family: 'Times New Roman OS Bold ';
    font-size: 24px;
}

span.naac-line {
    color: #002060;
    font-weight: 500;
    font-family: 'Times New Roman OS Bold ';
    font-size: 20px;
}
    </style>
    <!-- Main Header -->
    <div class="siws-container header-width">
        <div class="header-content">
            <!-- Desktop View -->
            <div class="desktop-container">
                <div class="logo-brand">
                    <div class="row align-items-center">
                        <!-- Logo -->
                        <div class="col-auto">
                            <div class="logo-container logo-mobile">
                                <a href="<?php echo esc_url(home_url('/')); ?>" class="siws-logo">
                                    <img src="<?php echo get_template_directory_uri(); ?>/custom-templates/images/siws_logo.png" alt="SIWS Logo" />
                                </a>
                            </div>
                        </div>
                        <!-- Header Text -->
                        
                        <div class="col">
                            <div class="header-text">
                                <span class="siws">S.I.W.S</span> <br><span class="swamy-line">N.R. SWAMY COLLEGE OF COMMERCE & ECONOMICS AND <br>SMT. THIRUMALAI COLLEGE OF SCIENCE<br> (AUTONOMOUS)</span><br><span class="naac-line">NAAC Re-Accredited A Grade with 3.15 CGPA<br>College Code 311 | AISHE CODE.C-34030 | Wadala, Mumbai 400031 |</span></a>
                            </div>
                        </div>                    
                    </div>
                </div>
                <div class="header-menu">
                    <div class="row align-items-center">
                        <!-- Navigation Menu -->
                        <div class="menu-container col">
                            <?php
                            if (has_nav_menu('mega_menu_location')) {
                                wp_nav_menu(array(
                                    'theme_location' => 'mega_menu_location',
                                    'container'      => 'nav',
                                    'container_class' => 'mega-menu-container',
                                    'menu_class'     => 'mega-menu',
                                    'fallback_cb'    => false,
                                ));
                            }
                            ?>
                        </div>
                        <!-- Icon Section -->
                        <div class="col-auto icon-container icon-section">
                            <a href="https://datavista.in/cms/staff/auth/login.php?sectionmaster_Id=11" class="header-icon" target="__blank">
                                <img src="https://www.siwscollege.edu.in/wp-content/uploads/2025/01/User.png" alt="Icon">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Mobile View -->
            <div class="mobile-container">
                <div class="row align-items-center">
                    <!-- Logo -->
                    <div class="logo-container col-6">
                        <a href="<?php echo esc_url(home_url('/')); ?>" class="siws-logo">
                            <img src="<?php echo get_template_directory_uri(); ?>/custom-templates/images/siws_logo.png" alt="SIWS Logo" />
                        </a>
                    </div>

                    <!-- Icon and Toggle Button -->
                    <div class="icon-and-toggle col-6 d-flex justify-content-end align-items-center">
                        <!-- User Icon -->
                        <div class="icon-container me-2">
                            <a href="https://datavista.in/cms/staff/auth/login.php?sectionmaster_Id=11" class="header-icon" target="__blank">
                                <img src="https://www.siwscollege.edu.in/wp-content/uploads/2025/01/User.png" alt="Icon">
                            </a>
                        </div>

                        <!-- Toggle Button -->
                        <div class="menu-toggle">
                            <button id="mobile-menu-toggle" class="menu-btn">
                                <img src="<?php echo get_template_directory_uri(); ?>/custom-templates/images/icons/toggle.webp" alt="Toggle Menu" />
                            </button>
                        </div>
                    </div>
                </div>
                <!-- Hidden Mobile Menu -->
                <div id="mobile-menu" class="mobile-menu">
                    <?php
                    if (has_nav_menu('mobile_menu_location')) {
                        wp_nav_menu(array(
                            'theme_location' => 'mobile_menu_location',
                            'container'      => 'nav',
                            'container_class' => 'mobile-nav-container',
                            'menu_class'     => 'mobile-nav',
                            'fallback_cb'    => false,
                        ));
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const mobileMenuToggle = document.getElementById('mobile-menu-toggle');
            const mobileMenu = document.getElementById('mobile-menu');

            // Toggle mobile menu visibility
            mobileMenuToggle.addEventListener('click', function() {
                mobileMenu.classList.toggle('open');
            });

            // Add "has-submenu" class dynamically to menu items with submenus
            document.querySelectorAll('.mobile-nav li').forEach(function(menuItem) {
                const submenu = menuItem.querySelector('ul'); // Check if submenu exists
                if (submenu) {
                    const anchor = menuItem.querySelector('a');
                    if (anchor) {
                        anchor.classList.add('has-submenu'); // Add class to items with submenus
                    }
                }
            });

            // Toggle submenu and arrow state for main and nested submenus
            document.querySelectorAll('.mobile-nav li > a.has-submenu').forEach(function(menuItem) {
                menuItem.addEventListener('click', function(event) {
                    const submenu = this.nextElementSibling;
                    if (submenu && submenu.tagName === 'UL') {
                        event.preventDefault(); // Prevent default action for submenu links
                        const parentLi = submenu.parentElement;

                        // Close sibling submenus at the same level
                        closeSiblingSubmenus(parentLi);

                        // Toggle open/close state with animation
                        toggleSubmenu(parentLi, submenu);
                    }
                });
            });

            // Function to toggle submenu with animation
            function toggleSubmenu(parentLi, submenu) {
                const isOpen = parentLi.classList.contains('open');

                if (isOpen) {
                    submenu.style.height = submenu.scrollHeight + 'px';
                    requestAnimationFrame(() => {
                        submenu.style.height = '0';
                    });
                    parentLi.classList.remove('open');
                } else {
                    submenu.style.height = '0';
                    requestAnimationFrame(() => {
                        submenu.style.height = submenu.scrollHeight + 'px';
                    });
                    parentLi.classList.add('open');

                    // Remove inline height after animation
                    submenu.addEventListener(
                        'transitionend',
                        function() {
                            if (parentLi.classList.contains('open')) {
                                submenu.style.height = '';
                            }
                        }, {
                            once: true
                        }
                    );
                }
            }

            // Function to close sibling submenus at the same level
            function closeSiblingSubmenus(currentLi) {
                const siblings = Array.from(currentLi.parentElement.children).filter(
                    (child) => child !== currentLi && child.classList.contains('open')
                );

                siblings.forEach(function(sibling) {
                    const submenu = sibling.querySelector('ul');
                    if (submenu) {
                        submenu.style.height = submenu.scrollHeight + 'px';
                        requestAnimationFrame(() => {
                            submenu.style.height = '0';
                        });
                        sibling.classList.remove('open');
                    }
                });
            }
        });

        document.addEventListener('DOMContentLoaded', function() {
            var menuItem = document.getElementById('mega-menu-item-5790');
            if (menuItem) {
                var link = menuItem.querySelector('a');
                if (link) {
                    link.setAttribute('target', '_blank');
                }
            }
        });
    </script>
</header>