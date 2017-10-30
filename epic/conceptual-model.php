<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Let's Chill | Conceptual Model</title>
	</head>
	<body>
		<h1>Conceptual Model</h1>
		<h4>PROFILE</h4>
		<ul>
			<li>profileId (primary key)</li>
			<li>profileActivationToken</li>
			<li>profileUserName</li>
			<li>profileFirstName</li>
			<li>profileLastName</li>
			<li>profileEmail</li>
			<li>profileHash</li>
			<li>profileSalt</li>
			<li>profileBio</li>
			<li>profileImage</li>
		</ul>
		<h4>EVENT</h4>
		<ul>
			<li>eventId (primary key)</li>
			<li>eventProfileId (foreign key) - host of event </li>
			<li>eventName</li>
			<li>eventDetail</li>
			<li>eventLocation</li>
			<li>eventDateTime</li>
			<li>eventDuration</li>
			<li>eventAttendeeLimit</li>
			<li>eventCategory</li>
			<li>eventImage</li>
			<li>eventPrice</li>
			<li>eventType - public or private event</li>
		</ul>
		<h4>ATTENDEE RATING</h4>
		<ul>
			<li>attendeeRatingId (primary key)</li>
			<li>attendeeRaterProfileId (foreign key) - For the person giving the rating</li>
			<li>attendeeRateeProfileId (foreign key) - For the person receiving the rating</li>
			<li>attendeeEventId (foreign key) - What event the profile is being rated from</li>
			<li>attendeeSocialScore</li>
			<li>attendeeRatingClosed? - ability to rate an event closes foo days after the event</li>
		</ul>
		<h4>EVENT RATING</h4>
		<ul>
			<li>eventRatingId (primary key)</li>
			<li>eventRatingProfileId (foreign key) - For the person rating the event</li>
			<li>eventRatingEventId (foreign key)</li>
			<li>eventRatingEventScore</li>
			<li>eventRatingClosed? - ability to rate an event closes foo days after the event</li>
		</ul>
		<h4>EVENT ATTENDANCE</h4>
		<ul>
			<li>attendanceID (primary key)</li>
			<li>attendanceEventId (foreign key)</li>
			<li>attendanceProfileId (foreign key)</li>
			<li>attendanceStatus</li>
			<li>attendanceNumberAttending</li>
			<li>attendanceCheckIn</li>
		</ul>
		<h4>FRIENDS</h4>
		<ul>
			<li>friendID (primary key)</li>
			<li>friendProfileId (foreign key) - this is the root friend</li>
			<li>friendProfileProfileId (foreign key) - this is the profile of the friend of the user</li>
			<li>friendGroupName? - is this hard to do?</li>
			<li>friendActivationToken</li>
		</ul>
		<h4>INTERESTS</h4>
		<ul>
			<li>interestID (primary key)</li>
			<li>interestTag</li>
		</ul>
	</body>
</html>