# Here are the main changes:

## Database backend is now required.
* Database should start with 3 tables, hospitals, drgs, and a many-to-many linking table that links these and includes the financial data.
## Users and Logins
* Users can now log in.  There are regular users and admin users.
* There must be a user account, username "ct310" with password "cookiesareyummy"
* There must be an admin account, username "ct310admin" with password "RoundPiesAreBest"
## Table Pagination
* On the Hospital and DRG details pages, the tables are now paginated to show 20 entries at a time.
## Reddit-style comments
* On the Hospital Detail Page, below the paginated table, allow users to post "reddit-style" comments.  This includes:
  * Can create a top-level comment.
  * Can reply to an existing comment.
  * Can upvote/downvote a comment (show the comment's current score by it)
  * A user can edit their own comments.  Admins can edit any comment.
  * A user can delete their own comment, Admins can delete any comment.
    * A comment without replies is completely deleted
    * A comment with replies is replaced with "[deleted]" and is no longer editable or deletable
    * Deleted comments no longer display the user name
  * Comments display:
    * date/time originally created
    * date/time last edited (if any)
    * Username of the user who created the comment
