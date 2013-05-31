$(function(){
  $('#anythingSlider').anythingSlider({
    width: 284, // Override the default CSS width
    height: 456, // Override the default CSS height
    resizeContents: true, // If true, solitary images/objects in the panel will expand to fit the viewport
    tooltipClass: 'tooltip', // Class added to navigation & start/stop button (text copied to title if it is hidden by a negative text indent)
    startPanel: 1, // This sets the initial panel
    hashTags: true, // Should links change the hashtag in the URL?
    enableKeyboard: true, // if false, keyboard arrow keys will not work for the current panel.
    buildArrows: false, // If true, builds the forwards and backwards buttons
    toggleArrows: false, // if true, side navigation arrows will slide out on hovering & hide @ other times
    buildNavigation: true, // If true, builds a list of anchor links to link to each panel
    enableNavigation: true, // if false, navigation links will still be visible, but not clickable.
    toggleControls: false, // if true, slide in controls (navigation + play/stop button) on hover and slide change, hide @ other times
    forwardText: "&raquo;", // Link text used to move the slider forward (hidden by CSS, replaced with arrow image)
    backText: "&laquo;", // Link text used to move the slider back (hidden by CSS, replace with arrow image)
    enablePlay: true, // if false, the play/stop button will still be visible, but not clickable.
    autoPlay: true, // This turns off the entire slideshow FUNCTIONALY, not just if it starts running or not
    autoPlayLocked: true, // If true, user changing slides will not stop the slideshow
    startStopped: false, // If autoPlay is on, this can force it to start stopped
    pauseOnHover: true, // If true & the slideshow is active, the slideshow will pause on hover
    resumeOnVideoEnd: true, // If true & the slideshow is active & a youtube video is playing, the autoplay will pause until the video completes
    stopAtEnd: false, // If true & the slideshow is active, the slideshow will stop on the last page
    playRtl: false, // If true, the slideshow will move right-to-left
    startText: "Start", // Start button text
    stopText: "Stop", // Stop button text
    delay: 3000, // How long between slideshow transitions in AutoPlay mode (in milliseconds)
    resumeDelay: 30000, // Resume slideshow after user interaction, only if autoplayLocked is true (in milliseconds).
    animationTime: 300, // How long the slideshow transition takes (in milliseconds)
    clickArrows: "click", // Event used to activate arrow functionality (e.g. "click" or "mouseenter")
    clickControls: "click focusin", // Events used to activate navigation control functionality
    clickSlideshow: "click", // Event used to activate slideshow play/stop button
    addWmodeToObject: "opaque", // If there is an embedded object & swfobject.js is active, the script will automatically add this wmode parameter
    maxOverallWidth: 32766 // Max width (in pixels) of combined sliders (side-to-side); set to 32766 to prevent problems with Opera
	});
});