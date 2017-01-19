;(function ($, window, document, undefined) {
    'use strict';

    var $visibleContents, $hiddenContents, $icons;

    var init = function () {
        $visibleContents = $('.collapsible-content--visible');
        $hiddenContents = $visibleContents.next();
        $icons = $visibleContents.find('.collapsible-content--icon');
        $visibleContents.on('click', clickHandler); // You can pass data like this with the contentType etc (just like passing parameters into a PHP function)
        //$visibleContents.on('click', {contentType: 'qa'}, clickHandler); // You can pass data like this with the contentType etc (just like passing parameters into a PHP function)
    }

    /**
     * This will be the click event handler
     *
     * She likes using var functions when it's going to be something that
     * she's going to be use for a click event or something that's going to
     * happen outside this particular script
     *
     * When they're internal and they're going to stay within this scope (this
     * script) she does it just function (without the var)
     *
     * @param event
     */
    var clickHandler = function() {
        var index = $visibleContents.index( this ),
            $hiddenContent = $( $hiddenContents[ index ] ),
            isHiddenContentShowing = $hiddenContent.is(':visible');

        if ( isHiddenContentShowing ) {
            $hiddenContent.slideUp( {
                duration: 5000,
                easing: 'linear',
            } );
        } else {
            $hiddenContent.slideDown( 1000 );
        }

        changeIcon( index, isHiddenContentShowing );

        // console.log( event.data );
    }

    /*******************
     * Helper Functions
     *******************/

    /**
     * Change the Icon Handler
     */
    function changeIcon( index, isHiddenContentShowing ) {
        var $iconElement = $( $icons[ index ] ),
            showIcon = $iconElement.data( 'showIcon' ),
            hideIcon = $iconElement.data( 'hideIcon' ),
            removeClass, addClass;

        // console.log( showIcon );
        // console.log( hideIcon );

        if ( isHiddenContentShowing ) {
            addClass = showIcon;
            removeClass = hideIcon;
        } else {
            addClass = hideIcon;
            removeClass = showIcon;
        }

        $iconElement
            .removeClass( removeClass )
            .addClass( addClass );


    }

    /**
     * Strictly not necessary because you're already loading this script in the
     * footer, but sometimes there will be other scripts that didn't fire yet
     *
     * If you don't want to use this way just use init(); on its own
     */
    $(document).ready(function () {
        init();

        //console.log( scriptParameters );
        //console.log( scriptParameters.showIcon );
    });

})(jQuery, window, document);
