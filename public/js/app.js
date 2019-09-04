(function() {
    // Theme switch
    let themeSwitch = document.getElementById('themeSwitch');
    let root = document.getElementsByTagName( 'html' )[0];
    let baseClass = "h-full";
    initTheme(); // if user has already selected a specific theme -> apply it
    if(themeSwitch) {
        themeSwitch.addEventListener('change', function (event) {
            resetTheme(); // update color theme
        });
    }

    function initTheme() {
        let darkThemeSelected = (localStorage.getItem('themeSwitch') !== null && localStorage.getItem('themeSwitch') === "dark");
        // update checkbox
        if(themeSwitch) {
            themeSwitch.checked = darkThemeSelected;
        }
        // update body data-theme attribute
        darkThemeSelected ? root.className += ' mode-dark' : null;
    }

    if(themeSwitch) {
        function resetTheme() {
            if (themeSwitch.checked) { // dark theme has been selected
                root.className += ' mode-dark';
                localStorage.setItem('themeSwitch', 'dark');
            } else {
                root.className = baseClass;
                localStorage.removeItem('themeSwitch');
            }
        }
    }
}());
