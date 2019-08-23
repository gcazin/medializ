(function() {
    // Theme switch
    var themeSwitch = document.getElementById('themeSwitch');
    var root = document.getElementsByTagName( 'html' )[0];
    var baseClass = "h-full";
    if(themeSwitch) {
        initTheme(); // if user has already selected a specific theme -> apply it
        themeSwitch.addEventListener('change', function(event){
            resetTheme(); // update color theme
        });

        function initTheme() {
            var darkThemeSelected = (localStorage.getItem('themeSwitch') !== null && localStorage.getItem('themeSwitch') === 'dark');
            // update checkbox
            themeSwitch.checked = darkThemeSelected;
            // update body data-theme attribute
            darkThemeSelected ? root.className += ' mode-dark' : null;
        };

        function resetTheme() {
            if(themeSwitch.checked) { // dark theme has been selected
                root.className += ' mode-dark';
                localStorage.setItem('themeSwitch', 'dark');
            } else {
                root.className = baseClass;
                localStorage.removeItem('themeSwitch');
            }
        };
    }
}());
