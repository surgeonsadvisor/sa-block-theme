/**
 *
 * Function to add/remove class from item. No jQuery needed.
 * 
 * @param {element to add a class} $element
 * @param {name of the class to be added} $class
 */

 function toggleClassJS($element, $class) {
    if ($element.classList.contains($class)) {
        $element.classList.remove($class);
    } else {
        $element.classList.add($class);
    }
}

function getChildren(n, skipMe) {
    var r = [];
    for (; n; n = n.nextSibling)
        if (n.nodeType == 1 && n != skipMe)
            r.push(n);
    return r;
};

function getSiblings(n) {
    return getChildren(n.parentNode.firstChild, n);
}


//* Mobile menu animation
let $body = document.querySelector("body");
let siteHeader = document.querySelector( ".site-header" );
let openNav = document.querySelector(".open-nav");
let closeNav = document.querySelector(".close-nav");
let mobileBackgroundMenu = document.querySelector( ".mobile-background-menu" );
let itemHasChildren = document.querySelectorAll(".site-header .wp-block-navigation .wp-block-navigation-item.has-child");
let buttonSubmenuToggleAll = document.querySelectorAll( ".wp-block-navigation-submenu__toggle" );

if (openNav) {
    openNav.addEventListener( "click", function() {
        $body.classList.add( "is-active" );
        siteHeader.classList.add("is-active");
        mobileBackgroundMenu.classList.add( "is-active" );
    } );
}

if (closeNav) {
    closeNav.addEventListener( "click", function(){
        $body.classList.remove( "is-active" );
        siteHeader.classList.remove( "is-active" );
        mobileBackgroundMenu.classList.remove( "is-active" );
    } );
}

/* for (let i = 0; i < itemHasChildren.length; i++) {

    itemHasChildren[i].children[1].addEventListener("click", function (e) {
            
        let $parentElement = this.parentElement;
        toggleClassJS($parentElement, "is-active");
        let $siblings = getSiblings($parentElement);

        for (let j = 0; j < $siblings.length; j++) {

            if ($siblings[j].classList.contains("is-active")) {
                $siblings[j].classList.remove("is-active");
            }
        }
    });
} */

for (let i = 0; i < buttonSubmenuToggleAll.length; i++) {
    const buttonSubmenuToggle = buttonSubmenuToggleAll[i];

    buttonSubmenuToggle.addEventListener( "click", function(e){
        const ariaStatus = this.getAttribute("aria-expanded");
        
        if (ariaStatus) {
            this.parentElement.classList.toggle( "is-active" );
        } 

    } );
    
}