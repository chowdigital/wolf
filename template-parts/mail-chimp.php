<?php
/**
 * Template part for displaying mail chimp
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Cloudsdale_Theme
 */

?><div id="mc_embed_shell m-5">
    <style type="text/css">
    #mc_embed_signup {
        background-color: #f9f9f9;
        /* Light background for the form */
    }

    .mc-field-group input,
    .mc-field-group input:focus {
        background-color: #f9f9f9;
        /* Keeps the input fields background consistent */
        border: none;
        /* Teal border for input fields */
        padding-top: 11px;
        color: #091c2b;
        /* Dark navy text for input */
        outline: 0;
    }

    .mc-field-group .email,
    .mc-field-group .name-input {
        width: 100%;
    }

    .btn-navy {
        color: #f9f9f9;
        /* Light text on the button for contrast */
        background-color: #197884;
        /* Teal background for the button */
        border: none;
        border-radius: 0;
        flex-basis: 30%;
    }

    .btn-navy h3 {
        margin-bottom: 0;
    }

    #mc_embed_signup_scroll {
        color: #091c2b;
        /* Dark navy text inside the signup scroll area */
        background-color: #f9f9f9;
        /* Light background for contrast */
        flex-basis: 70%;
    }

    input {
        font-size: 1.75rem;
        font-family: "caudex", sans-serif;
        letter-spacing: .1em;
        text-transform: lowercase;
        text-align: center;
        padding-top: 0.6em;
    }

    #mc_embed_signup div.mce_inline_error {
        margin: 0 0 1em 0;
        padding: 5px 10px;
        background-color: #197884;
        /* Teal background for error messages */
        z-index: 1;
        color: #f9f9f9;
        /* Light text for contrast */
    }

    #mc_embed_signup input.mce_inline_error {
        border-color: #197884;
        /* Teal border color for error inputs */
    }

    #mc-embedded-subscribe {
        background-color: #091c2b;
        border: 3px solid #091c2b;
        cursor: pointer;
        /* Changes cursor to hand symbol on hover */
    }

    #mc-embedded-subscribe h3 {
        padding-top: 0;
    }

    #mc-embedded-subscribe:hover {
        background-color: #197884;
        border: 3px solid #091c2b;
        /* Dark navy background on hover */
        color: #f9f9f9;
        /* Light text for contrast */
        transition: all .3s ease-out;
    }

    .form-box {
        display: flex;
    }
    </style>
    <div id="mc_embed_signup" class="testclass2" style="position: relative;">
        <form
            action="https://kingsarmshamptoncourt.us21.list-manage.com/subscribe/post?u=916bc7406b105c2c6143d965c&amp;id=552d6a75f7&amp;f_id=0064fae6f0"
            method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate"
            target="_blank">
            <div class="form-box">
                <div id="mc_embed_signup_scroll">
                    <div class="mc-field-group v-center bg-craft">
                        <input type="email" name="EMAIL" class="required email v-center" id="mce-EMAIL" required=""
                            value="" placeholder="Your Email">
                        <span id="mce-EMAIL-HELPERTEXT" class="helper_text"></span>
                    </div>
                    <div id="mce-responses" class="clear">
                        <div class="response" id="mce-error-response" style="display: none;"></div>
                        <div class="response" id="mce-success-response" style="display: none;"></div>
                    </div>
                    <!-- Hidden field to prevent bot signups -->
                    <div style="position: absolute; left: -5000px;" aria-hidden="true">
                        <input type="text" name="b_916bc7406b105c2c6143d965c_552d6a75f7" tabindex="-1" value="">
                    </div>
                </div>
                <button value="Subscribe" name="subscribe" id="mc-embedded-subscribe"
                    class="btn-navy v-center bg-craft navy-overlay" type="submit">
                    <h3>join us</h3>
                </button>
            </div>
        </form>
    </div>
</div>