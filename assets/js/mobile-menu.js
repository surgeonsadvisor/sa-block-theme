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

let $body = document.querySelector("body");
let siteHeader = document.querySelector( ".site-header" );
let openNav = document.querySelector(".open-nav");

if (openNav) {
    openNav.addEventListener( "click", function() {
        $body.classList.add( "is-active" );
        siteHeader.classList.add("is-active");
    } );
}