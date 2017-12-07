export class Profile {
	constructor(public profileId: string,
					public profileActivationToken: string,
					public profileBio: string,
					public profileEmail: string,
					public profileFirstName: string,
					public profileImage: string,
					public profileLastName: string,
					public profileUsername: string
	) {}
}