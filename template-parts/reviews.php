<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Cloudsdale_Theme
 */

?> <script>
function initMap() {
    var service = new google.maps.places.PlacesService(document.createElement('div'));
    service.getDetails({
        placeId: 'ChIJ1ZpsghcLdkgRdU5bO5mWVc0', // Replace with your Place ID
        fields: ['reviews']
    }, function(place, status) {
        if (status === google.maps.places.PlacesServiceStatus.OK) {
            var reviewsContainer = document.getElementById('google-reviews');
            reviewsContainer.innerHTML = ''; // Clear previous content
            // Filter to get only 5-star reviews and slice to get the first three
            var fiveStarReviews = place.reviews.filter(review => review.rating === 5).slice(0, 3);
            fiveStarReviews.forEach(function(review) {
                var reviewElement = document.createElement('div');
                reviewElement.className = 'review';
                var stars = '<span class="stars">' + '⭐⭐⭐⭐⭐' + '</span>';
                reviewElement.innerHTML = `
                    ${stars}
                    <p>"${review.text}"</p>
                    <p class="reviewer-name">${review.author_name}</p>
                `;
                reviewsContainer.appendChild(reviewElement);
            });
        }
    });
}
</script>
<script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyApsM3ctvcBoPzajzZgS5SOL_ZbA_d8Dcw&libraries=places&callback=initMap">
</script>
<div id="google-reviews"></div>