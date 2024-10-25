<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Cloudsdale_Theme
 */

?>
<header class="page-header section-heading">
    <h2>Reserve a table</h2>
</header>

<div class="col-12  col-lg-6">
    <script src="//partners.designmynight.com/pf/js?venue_id=5cc1b4e15a05b659da22bece&amp;allow_any=false" id="dmn-js">
    </script>


</div>
<style>
.dmn-form h1,
.dmn-form .powered-by {
    display: none;
}

.dmn-form,
#dmn-type,
.dmn-form select,
.dmn-date {
    width: 100%;
}

.dmn-form {
    border: none;
    color: #197884 !important;
    width: 100%;
    padding: 0;
    /* Ensure padding is 0 */
}

.dmn-form input,
.dmn-form select {
    -webkit-box-sizing: border-box !important;
    box-sizing: border-box !important;
    width: 100% !important;
    min-height: 32px;
    background-color: transparent !important;
    border: 2px solid !important;
    border-radius: 0 !important;
    -webkit-box-shadow: none !important;
    box-shadow: none !important;
    color: #197884 !important;
    font-family: mabry-regular, sans-serif;
    font-weight: 400;
    font-size: 1em;
    line-height: 10px !important;
}

.dmn-form select,
.dmn-form input,
#dmn-date {
    width: 100%;
    background-color: #C4EAE3;
    border: none;
}

.dmn-form .datepicker.popover table,
.dmn-form .datepicker.inline table,
.dmn-form .dropdown-menu[datepicker-popup-wrap] table,
.dmn-form [uib-datepicker-popup-wrap] table {
    background: #fff;
}

.dmn-form .datepicker.popover,
.dmn-form .datepicker.inline,
.dmn-form .dropdown-menu[datepicker-popup-wrap],
.dmn-form [uib-datepicker-popup-wrap] {
    border-radius: 0px;
    padding: 0;
}

.dmn-form .datepicker.popover .btn.date,
.dmn-form .datepicker.inline .btn.date,
.dmn-form .dropdown-menu[datepicker-popup-wrap] .btn.date,
.dmn-form [uib-datepicker-popup-wrap] .btn.date {
    padding: 0px 0px;
}

.dmn-form .popover {
    box-shadow: none;
}

.dmn-form .main-inputs {
    display: flex;
    align-items: flex-start;
    flex-wrap: wrap;
    width: 100%;
    justify-content: space-between;
}

.dmn-type-container,
.dmn-num-people-container,
.dmn-date-container,
.dmn-time-container,
.dmn-duration-container,
.dmn-form .btn.submit {
    width: 100%;
}

.dmn-form .btn-link {
    border-color: transparent;
    cursor: pointer;
    color: #197884;
    -webkit-border-radius: 0;
    -moz-border-radius: 0;
    border-radius: 0;
}

.dmn-form .btn-primary {
    background-image: none;
    background-color: #197884 !important;
    color: #fff !important;
    /* Ensure text stays white */
    border: none;
    font-size: 1em;
    line-height: 1.5em;
    transition: box-shadow 0.3s ease;
    /* Smooth transition for shadow */
}

.dmn-form .btn-primary:hover {
    color: #fff !important;
    /* Keep text white */
    -webkit-box-shadow: 0 5px 11px 0 rgba(0, 0, 0, 0.18), 0 4px 15px 0 rgba(0, 0, 0, 0.15);
    box-shadow: 0 5px 11px 0 rgba(0, 0, 0, 0.18), 0 4px 15px 0 rgba(0, 0, 0, 0.15);
}

@media only screen and (min-width: 992px) {

    .dmn-num-people-container,
    .dmn-date-container,
    .dmn-time-container,
    .dmn-duration-container {
        width: calc(50% - 5px);
    }

    .dmn-form .btn.submit {
        width: calc(50% - 5px);
    }
}
</style>