<?php
/**
 * 404 template.
 *
 * @package Neve
 */

get_header(); ?>

<style>
	.main-404 {
		max-width: 1170px;
		margin: 40px auto;
		padding: 0 15px;
	}
	.title-404 {
		font-size: 33px;
		line-height: 1.2;
	}
	.slogan-404 {
		font-size: 20px;
		padding: 15px 0;
	}
	.services-wrap {
		display: flex;
		flex-wrap: wrap;
		gap: 20px;
		margin: 0 auto;
	}
	.box-404 {
		width: calc((100% - 40px) / 3);
		height: 220px; 
		position: relative;
		overflow: hidden;
		box-shadow: 0 1px 3px var(--text-color);
	}
	.box-404 img {
		width: 100%;
		height: 100%;
		object-fit: cover;
	}
	.box-404 > a {
		display: inline-block;
		position: absolute;
		left: 50%;
		top: 50%;
		transform: translate(-50%, -50%);
		text-align: center;
		color: var(--light-grey);
		border: 1px solid var(--light-grey);
		border-radius: 2px;
		background-color: rgba(0, 0, 0, 0.3);
		padding: 10px;
		transition: background-color 0.3s ease;
	}
	.box-404:hover > a {

	}

	@media (max-width:780px) {
		.main-404 {
			max-width: 500px;
		}
		.main-404 .services-wrap {
			flex-direction: column;
		}
		.main-404 .box-404 {
			width: 100%;
			max-width: 400px;
			margin: 0 auto;
		}
	}

</style>

	<div class="main-404">

		<p class="title-404">Everything changes!</p>

		<p class="slogan-404">Sorry, our website is in constant improvement, the page 
			you are looking for has probably evolved.</p>

		<div class="services-wrap">

			<div class="box-404">
				<img src="/wp-content/uploads/yoga-teacher-training-bali-course-mobile.jpg">
				<a href="/yoga-teacher-training/">Yoga Teacher Trainings</a>
			</div>

			<div class="box-404">
				<img src="/wp-content/uploads/yoga-teacher-training-final-teaching-test-1-768x320.jpg">
				<a href="/200-hour-yoga-teacher-training/">200hrs YTT program</a>
			</div>

			<div class="box-404">
				<img src="/wp-content/uploads/300-hours-yoga-teacher-training-course-belinda-768x324.jpg">
				<a href="/300-hour-yoga-teacher-training/">300hrs YTT program</a>
			</div>

			<div class="box-404">
				<img src="/wp-content/uploads/NIK3026-2.jpg">
				<a href="/multi-styles-yoga-retreat/">Multi-Styles Retreat</a>
			</div>

			<div class="box-404">
				<img src="/wp-content/uploads/NIK0995.jpg">
				<a href="/reconnection-yoga-retreat/">Reconnection Retreat</a>
			</div>

			<div class="box-404">
				<img src="/wp-content/uploads/private-yoga-class-bali.jpg">
				<a href="/private-yoga-classes/">Private Classes</a>
			</div>
			
			<div class="box-404">
				<img src="/wp-content/uploads/group-yoga-class-380px.jpg">
				<a href="/yoga-classes/">Group Classes</a>
			</div>

			<div class="box-404">
				<img src="/wp-content/uploads/sadhu-380px.jpg">
				<a href="/blog/">Blog & Ressources</a>
			</div>

			<div class="box-404">
				<img src="/wp-content/uploads/yogabreezebali-students-bali-beach.jpg">
				<a href="/student-testimonials/">Testimonials</a>
			</div>
				
		</div>
	</div>

<?php get_footer(); ?>