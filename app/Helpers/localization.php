<?php
function locale_link( $route, $locale ) {
//    $components = parse_url($route);
//    $route = $components['path'] . '?' . $components['query'] . '#' . $components['fragment'];
    $url = parse_url($route);
    $route = $url['path'];
    if (isset($url['query'])) $route .= "?{$url[query]}";
    if (isset($url['fragment'])) $route .= "#{$url[fragment]}";
    if( array_key_exists( substr( $route, 1, 2 ), config('app.locales') ) ) {
        $res = $locale != 'ua' ? str_replace( substr( $route, 1, 2 ), $locale, $route ) : str_replace( substr( $route, 0, 3 ), '', $route ) ;
    }
    else {
        $res = $locale != 'ua' ? '/'.$locale.$route : $route ;
    }

    return $res == '' ? '/' : $res;
}