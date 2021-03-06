<?php

namespace Edu\Cnm\CrowdVibe;
require_once  ("autoload.php");
require_once(dirname(__DIR__, 2) . "/vendor/autoload.php");

use Ramsey\Uuid\Uuid;

/**
 * CrowdVibe Rating
 *
 * This is the rating information to be stored for both CrowdVibe events and profiles.
 *
 * @author Matt David <mdavid3636@gmail.com>
 * @version 1.0.0
 **/
class Rating implements \JsonSerializable {
    use ValidateDate;
    use ValidateUuid;

    /**
     * id for the Rating; this is the primary key
     * @var Uuid $ratingId
     */
    private $ratingId;

    /**
     * id of the event attended before being able to rate; this is a foreign key
     * @var Uuid $ratingEventAttendanceId
     */
    private $ratingEventAttendanceId;

    /**
     * id of a profile being rated only after attending similar event; this is a foreign key
     * @var Uuid $ratingRateeProfileId
     */
    private $ratingRateeProfileId;

    /**
     * id of the profile giving a rating; this is a foreign key
     * @var Uuid $ratingRaterProfileId
     */
    private $ratingRaterProfileId;

    /**
     * rating that has been given to a ratee or event by rater after attending events
     * @var int(3) unsigned $ratingScore
     */
    private $ratingScore;

    /**
     * constructor for this Rating
     *
     * @param string|Uuid $newRatingId id of the rating
     * @param string|Uuid $newRatingEventAttendanceId id of the event that was attended in order to make a Rating
     * @param string|Uuid $newRatingRateeProfileId id of a profile receiving Rating
     * @param string|Uuid $newRatingRaterProfileId id giving a Rating
     * @param string $newRatingScore this is the actual rating content
     * @throws \InvalidArgumentException if the date types are not valid
     * @throws \RangeException if data values are out of bounds (e.g., strings too long)
     * @throws \TypeError if date types violate type hints
     * @throws \Exception if some other exception occurs
     * @Documentation https://php.net/manuel/en/language.oop5.decon.php
     **/
    public function __construct($newRatingId, $newRatingEventAttendanceId, $newRatingRateeProfileId, $newRatingRaterProfileId, string $newRatingScore)
    {
        try {
            $this->setRatingId($newRatingId);
            $this->setRatingEventAttendanceId($newRatingEventAttendanceId);
            $this->setRatingRateeProfileId($newRatingRateeProfileId);
            $this->setRatingRaterProfileId($newRatingRaterProfileId);
            $this->setRatingScore($newRatingScore);
        } //determine what exception type was thrown
        catch (\InvalidArgumentException | \RangeException | \Exception | \TypeError $exception) {
            $exceptionType = get_class($exception);
            throw(new $exceptionType($exception->getMessage(), 0, $exception));
        }
    }

    /**
     * accessor method for rating id
     *
     * @return Uuid value of rating id
     **/
    public function getRatingId(): Uuid {
        return ($this->ratingId);
    }

    /**
     * mutator method for rating id
     *
     * @param Uuid /string $newRatingId new value of rating id
     * @throws \RangeException if $newRatingId is not positive
     * @throws \TypeError if $newRatingId is not a uuid or string
     **/

    public function setRatingId($newRatingId): void
    {
        try {
            $uuid = self::validateUuid($newRatingId);
        } catch (\InvalidArgumentException | \RangeException | \Exception | \TypeError $exception) {
            $exceptionType = get_class($exception);
            throw(new $exceptionType($exception->getMessage(), 0, $exception));
        }

        //convert and store the rating id
        $this->ratingId = $uuid;
    }

    /**
     * accessor method for rating event attendance id
     *
     * @return Uuid value of a rating event attendance id
     **/
    public function getRatingEventAttendanceId(): Uuid
    {
        return ($this->ratingEventAttendanceId);
    }

    /**
     * mutator method for rating event attendance id
     *
     * @param string | Uuid $newRatingEventAttendanceId new value of rating event attendance id
     * @throw \RangeException if $newRatingEventAttendanceId is not positive
     * @throw \TypeError if $newRatingProfileId is not an integer
     **/
    public function setRatingEventAttendanceId($newRatingEventAttendanceId): void
    {
        try {
            $uuid = self::validateUUid($newRatingEventAttendanceId);
        } catch (\InvalidArgumentException | \RangeException | \Exception | \TypeError $exception) {
            $exceptionType = get_class($exception);
            throw(new$exceptionType($exception->getMessage(), 0, $exception));
        }

        // convert and store the rating event attendance Id
        $this->ratingEventAttendanceId = $uuid;
    }

    /**
     * accessor method for rating ratee profile id
     *
     * @return Uuid value of a rating ratee profile id
     **/
    public function getRatingRateeProfileId(): Uuid
    {
        return ($this->ratingRateeProfileId);
    }

    /**
     * mutator method for rating ratee profile id
     *
     * @param string | Uuid $newRatingRateeProfileId new value of rating ratee profile id
     * @throw \RangeException if $newRatingRateeProfileId is not positive
     * @throw \TypeError if $new RatingRateeProfileId is not an integer
     **/
    public function setRatingRateeProfileId($newRatingRateeProfileId): void
    {
        try {
            $uuid = self::validateUUid($newRatingRateeProfileId);
        } catch (\InvalidArgumentException | \RangeException | \Exception | \TypeError $exception) {
            $exceptionType = get_class($exception);
            throw (new$exceptionType($exception->getMessage(), 0, $exception));
        }

        //convert and store the rating ratee profile id
        $this->ratingRateeProfileId = $uuid;
    }

    /**
     * accessor method for rating rater profile id
     *
     * @return Uuid value of a rating rater profile id
     **/
    public function getRatingRaterProfileId(): Uuid
    {
        return ($this->ratingRaterProfileId);
    }

    /**
     * mutator method for rating rater profile id
     *
     * @param string | Uuid $newRatingRaterProfileId new value of rating rater profile id
     * @throw \RangeException if $newRatingRaterProfileId is not positive
     * @throw \TypeError if $new RatingRaterProfileId is not an integer
     **/
    public function setRatingRaterProfileId($newRatingRaterProfileId): void
    {
        try {
            $uuid = self::validateUUid($newRatingRaterProfileId);
        } catch (\InvalidArgumentException | \RangeException | \Exception | \TypeError $exception) {
            $exceptionType = get_class($exception);
            throw (new$exceptionType($exception->getMessage(), 0, $exception));
        }

        //convert and store the rating rater profile id
        $this->ratingRaterProfileId = $uuid;
    }

    /**
     * accessor method for rating score
     *
     * @return int value of rating score
     **/
    public function getRatingScore(): int {
        return ($this->ratingScore);
    }

    /**
     * mutator method for rating score
     *
     * @param int $newRatingScore new value of rating score
     * @throws \InvalidArgumentException if $newRatingScore is not a string or insecure
     * @throws \RangeException if $newRatingScore is not positive
     **/
    public Function setRatingScore(int $newRatingScore): void {
        // if new rating score is less than min or greater than max throw range exception
        if ($newRatingScore < 0 || $newRatingScore > 5) {
            throw(new \RangeException("rating is out of range"));
        }

        $this->ratingScore = $newRatingScore;
    }

    /**
     * insert this Rating into mySQL
     *
     * @param \PDO $pdo PDO connection object
     * @throws \PDOException when mySQL related errors occur
     * @throws \TypeError if $pdo is not a PDO connection object
     **/
    public function insert(\PDO $pdo): void {

        // create query template
        $query = "INSERT INTO rating(ratingId, ratingEventAttendanceId, ratingRateeProfileId, ratingRaterProfileId, ratingScore) VALUES (:ratingId, :ratingEventAttendanceId, :ratingRateeProfileId, :ratingRaterProfileId, :ratingScore)";
        $statement = $pdo->prepare($query);

        $blameDaniel = true;
        if($blameDaniel) {
            $ratingRateeProfileId = $this->ratingRateeProfileId ? $this->ratingRateeProfileId->getBytes() : null;
            $parameters = ["ratingId" => $this->ratingId->getBytes(), "ratingEventAttendanceId" => $this->ratingEventAttendanceId->getBytes(), "ratingRateeProfileId" => $ratingRateeProfileId, "ratingRaterProfileId" => $this->ratingRaterProfileId->getBytes(), "ratingScore" => $this->ratingScore];
            $statement->execute($parameters);
        }
    }

    /**
     * delete this Rating from mySQL
     *
     * @param \PDO $pdo PDO connection object
     * @throws \PDOException when mySQL related error occur
     * @throws \TypeError if $pdo is not a PDO connection object
     **/
    public function delete(\PDO $pdo): void {
        //create query template
        $query = "DELETE FROM rating WHERE ratingId= :ratingId";
        $statement = $pdo->prepare($query);

        // bind the member variables to the place holder in the template
        $parameters = ["ratingId" => $this->ratingId->getBytes()];
        $statement->execute($parameters);
    }

    /**
     * update this Rating form mySQL
     *
     * @param \PDO $pdo PDO connection object
     * @throws \PDOException when mySQL related error occur
     **/
    public function update(\PDO $pdo): void {

        // create query template
        $query = "UPDATE rating SET ratingEventAttendanceId = :ratingEventAttendanceId, ratingRateeProfileId = :ratingRateeProfileId, ratingRaterProfileId =:ratingRaterProfileId, ratingScore = :ratingScore WHERE ratingId = :ratingId";
        $statement = $pdo->prepare($query);

        $parameters = ["ratingId" => $this->ratingId->getBytes(), "ratingEventAttendanceId" => $this->ratingEventAttendanceId->getBytes(), "ratingRateeProfileId" => $this->ratingRateeProfileId->getBytes(), "ratingRaterProfileId" => $this->ratingRaterProfileId->getBytes(), "ratingScore" => $this->ratingScore];
        $statement->execute($parameters);
    }

    /**
     * get the Rating by rating id
     *
     * @param \PDO $pdo $pdo PDO connection object
     * @param Uuid|string $ratingId rating Id to search for
     * @return Rating Rating or null if not found
     * @throws \PDOException when mySQL related errors occur
     * @throws \TypeError when variable is not the correct date type
     **/
    public static function getRatingByRatingId(\PDO $pdo, string $ratingId):?Rating {
        // sanitize the rating id before searching
        try {
            $ratingId = self::validateUuid($ratingId);
        } catch (\InvalidArgumentException | \RangeException | \Exception | \TypeError $exception) {
            throw (new \PDOException($exception->getMessage(), 0, $exception));
        }

        // create query template
        $query = "SELECT ratingId, ratingEventAttendanceId, ratingRateeProfileId, ratingRaterProfileId, ratingScore FROM rating WHERE ratingId = :ratingId";
        $statement = $pdo->prepare($query);

        // bind the rating id to the place holder in the template
        $parameters = ["ratingId" => $ratingId->getBytes()];
        $statement->execute($parameters);

        // grab the rating from mySQL
            try {
                $rating = null;
                $statement->setFetchMode(\PDO::FETCH_ASSOC);
                $row = $statement->fetch();
                if($row !== false) {

                    $rating = new Rating($row["ratingId"], $row["ratingEventAttendanceId"], $row["ratingRateeProfileId"], $row["ratingRaterProfileId"], $row["ratingScore"]);
                }
            } catch (\Exception $exception) {
                //if the row couldn't be covert, rethrow it
                throw(new \PDOException($exception->getMessage(), 0, $exception));
            }

        return ($rating);
    }

    /**
     * get the Rating by rating event attendance id
     *
     * @param \PDO $pdo $pdo PDO connection object
     * @param Uuid|string $ratingId rating Id to search for
     * @return \SplFixedArray of ratings found
     * @throws \PDOException when mySQL related errors
     * @throws \TypeError when variable is not the correct date type
     **/

    public static function getRatingByRatingEventAttendanceId(\PDO $pdo, $ratingEventAttendanceId): \SplFixedArray {
        // sanitize the rating id before searching
        try {
            $ratingEventAttendanceId = self::validateUuid($ratingEventAttendanceId);
        } catch (\InvalidArgumentException | \RangeException | \Exception | \TypeError $exception) {
            throw (new \PDOException($exception->getMessage(), 0, $exception));
        }

        // create query template
        $query = "SELECT ratingId, ratingEventAttendanceId, ratingRateeProfileId, ratingRaterProfileId, ratingScore FROM rating WHERE ratingEventAttendanceId = :ratingEventAttendanceId";
        $statement = $pdo->prepare($query);

        // bind the rating id to the place holder in the template
        $parameters = ["ratingEventAttendanceId" => $ratingEventAttendanceId->getBytes()];
        $statement->execute($parameters);

        // build an array
        $ratings = new \SplFixedArray($statement->rowCount());
        $statement->setFetchMode(\PDO ::FETCH_ASSOC);
        while (($row = $statement->fetch()) !== false) {
            try {
                $rating = new Rating($row["ratingId"], $row["ratingEventAttendanceId"], $row["ratingRateeProfileId"], $row["ratingRaterProfileId"], $row["ratingScore"]);
                $ratings[$ratings->key()] = $rating;
                $ratings->next();
            } catch (\Exception $exception) {
                //if the row couldn't be covert, rethrow it
                throw(new \PDOException($exception->getMessage(), 0, $exception));
            }
        }
        return ($ratings);
    }

        /**
         * get the Rating by rating ratee profile id
         *
         * @param \PDO $pdo $pdo PDO connection object
         * @param Uuid|string $ratingId rating Id to search for
         * @return Rating Rating or null if not found
         * @throws \PDOException when mySQL related errors occur
         * @throws \TypeError when variable is not the correct date type
         **/


        public static function getRatingByProfileId(\PDO $pdo, $profileId):?float {
            // sanitize the rating id before searching
            try {
                $profileId = self::validateUuid($profileId);
            } catch (\InvalidArgumentException | \RangeException | \Exception | \TypeError $exception) {
                throw (new \PDOException($exception->getMessage(), 0, $exception));
            }

            // create query template
            $query = "SELECT AVG(ratingScore) AS avgRatingScore FROM rating WHERE ratingRateeProfileId = :profileId";
            $statement = $pdo->prepare($query);

            // bind the rating id to the place holder in the template
            $parameters = ["profileId" => $profileId->getBytes()];
            $statement->execute($parameters);

            // grab the rating from mySQL
            try {
                $ratingAvg = null;
                $statement->setFetchMode(\PDO::FETCH_ASSOC);
                $row = $statement->fetch();
                if($row !== false) {
                    $ratingAvg = $row["avgRatingScore"];
                }
            } catch (\Exception $exception) {
                //if the row couldn't be covert, rethrow it
                throw(new \PDOException($exception->getMessage(), 0, $exception));
            }
            return ($ratingAvg);
        }

	/**
	 * get the Rating by rating event id
	 *
	 * @param \PDO $pdo $pdo PDO connection object
	 * @param Uuid|string $eventId rating Id to search for
	 * @return Rating Rating or null if not found
	 * @throws \PDOException when mySQL related errors occur
	 * @throws \TypeError when variable is not the correct date type
	 **/


	public static function getRatingByEventId(\PDO $pdo, $eventId):?float {
		// sanitize the event id before searching
		try {
			$eventId = self::validateUuid($eventId);
		} catch (\InvalidArgumentException | \RangeException | \Exception | \TypeError $exception) {
			throw (new \PDOException($exception->getMessage(), 0, $exception));
		}

		// create query template
		$query = "SELECT AVG(ratingScore) AS avgRatingScore FROM rating INNER JOIN eventAttendance ON eventAttendance.eventAttendanceId = rating.ratingEventAttendanceId WHERE eventAttendanceCheckIn = 1 AND eventAttendanceEventId = :eventId";
		$statement = $pdo->prepare($query);

		// bind the rating id to the place holder in the template
		$parameters = ["eventId" => $eventId->getBytes()];
		$statement->execute($parameters);

		// grab the rating from mySQL
		try {
			$ratingAvg = null;
			$statement->setFetchMode(\PDO::FETCH_ASSOC);
			$row = $statement->fetch();
			if($row !== false) {
				$ratingAvg = $row["avgRatingScore"];
			}
		} catch (\Exception $exception) {
			//if the row couldn't be covert, rethrow it
			throw(new \PDOException($exception->getMessage(), 0, $exception));
		}
		return ($ratingAvg);
	}

            /**
             * get the Rating by rating rater profile id
             *
             * @param \PDO $pdo $pdo PDO connection object
             * @param Uuid|string $ratingId rating Id to search for
             * @return \SplFixedArray SplFixedArray
             * @throws \PDOException when mySQL related errors occur
             * @throws \TypeError when variable is not the correct date type
             **/
            public static function getRatingByRatingRaterProfileId(\PDO $pdo, string $ratingRaterProfileId) : \SplFixedArray
            {
                // sanitize the rating id before searching
                try {
                    $ratingRaterProfileId = self::validateUuid($ratingRaterProfileId);
                } catch (\InvalidArgumentException | \RangeException | \Exception | \TypeError $exception) {
                    throw (new \PDOException($exception->getMessage(), 0, $exception));
                }

					// create query template
                $query = "SELECT ratingId, ratingEventAttendanceId, ratingRateeProfileId, ratingRaterProfileId, ratingScore FROM rating WHERE ratingRaterProfileId = :ratingRaterProfileId";
                $statement = $pdo->prepare($query);

                // bind the rating id to the place holder in the template
                $parameters = ["ratingRaterProfileId" => $ratingRaterProfileId->getBytes()];
                $statement->execute($parameters);

                // build an array of ratings
                $ratings = new \SplFixedArray($statement->rowCount());
                $statement->setFetchMode(\PDO::FETCH_ASSOC);
                while (($row = $statement->fetch()) !== false) {
                    try {
							  $rating = new Rating($row["ratingId"], $row["ratingEventAttendanceId"], $row["ratingRateeProfileId"], $row["ratingRaterProfileId"], $row["ratingScore"]);
                        $ratings[$ratings->key()] = $rating;
                        $ratings->next();
                    } catch (\Exception $exception) {
                        //if the row couldn't be covert, rethrow it
                        throw(new \PDOException($exception->getMessage(), 0, $exception));
                    }
                }
                return ($ratings);
            }


                /**
                 * formats the state variables for JSON serialization
                 *
                 * @return array resulting state variables to serialize
                 **/
                public
                function jsonSerialize()
                {
                    $fields = get_object_vars($this);
                    $fields["ratingId"] = $this->ratingId->toString();
                    $fields["ratingEventAttendanceId"] = $this->ratingEventAttendanceId->toString();
                    $fields["ratingRateeProfileId"] = $this->ratingRateeProfileId->toString();
                    $fields["ratingRaterProfileId"] = $this->ratingRaterProfileId->toString();
                    return ($fields);
                }
            }