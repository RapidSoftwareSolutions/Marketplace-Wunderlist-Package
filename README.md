[![](https://scdn.rapidapi.com/RapidAPI_banner.png)](https://rapidapi.com/package/Wunderlist/functions?utm_source=RapidAPIGitHub_WunderlistFunctions&utm_medium=button&utm_content=RapidAPI_GitHub)

# Wunderlist Package
Wunderlist is the easiest way to get stuff done. Whether you’re planning a holiday, sharing a shopping list with a partner or managing multiple work projects, Wunderlist is here to help you tick off all your personal and professional to-dos.
* Domain: [www.wunderlist.com](https://www.wunderlist.com)
* Credentials: clientId, clientSecret

## How to get credentials: 
1. Register on [www.wunderlist.com](https://www.wunderlist.com)
2. Create WunderList application in [console](https://developer.wunderlist.com/apps/new) 
3. After creation app, you will receive clienId and clientSecret
 
 
## Custom datatypes: 
 |Datatype|Description|Example
 |--------|-----------|----------
 |Datepicker|String which includes date and time|```2016-05-28 00:00:00```
 |Map|String which includes latitude and longitude coma separated|```50.37, 26.56```
 |List|Simple array|```["123", "sample"]``` 
 |Select|String with predefined values|```sample```
 |Array|Array of objects|```[{"Second name":"123","Age":"12","Photo":"sdf","Draft":"sdfsdf"},{"name":"adi","Second name":"bla","Age":"4","Photo":"asfserwe","Draft":"sdfsdf"}] ```
 
## Wunderlist.getAccessToken
Exchange code for an access token.

| Field        | Type       | Description
|--------------|------------|----------
| clientId     | credentials|  The Client ID you received from Wunderlist when you registered your application.
| client_secret| credentials| The client secret you received from Wunderlist when you registered.
| code         | String     | The code you received as a auth response, see more in readme.

## Wunderlist.getAllFolders
Get all Folders created by the the current User.

| Field      | Type       | Description
|------------|------------|----------
| clientId   | credentials|  The Client ID you received from Wunderlist when you registered your application.
| accessToken| String     | OAuth token for the current user.

## Wunderlist.getFolder
Get a specific Folder.

| Field      | Type       | Description
|------------|------------|----------
| clientId   | credentials|  The Client ID you received from Wunderlist when you registered your application.
| accessToken| String     | OAuth token for the current user.
| folderId   | String     | Single folder id which will be returned.

## Wunderlist.createFolder
Create a Folder.The created Folder is automatically owned by the User who creates it. Only the owner of a Folder can actually see/request it.See more in readme.

| Field      | Type       | Description
|------------|------------|----------
| clientId   | credentials|  The Client ID you received from Wunderlist when you registered your application.
| accessToken| String     | OAuth token for the current user.
| title      | String     | Folder title (maximum length is 255 characters).
| listIds    | String     | list of ids.

## Wunderlist.updateFolder
Update a Folder by overwriting properties.

| Field      | Type       | Description
|------------|------------|----------
| clientId   | credentials|  The Client ID you received from Wunderlist when you registered your application.
| accessToken| String     | OAuth token for the current user.
| revision   | Number     | Every entity in the Wunderlist API has a read-only revision property. This property is an integer which is updated in response to changes to that entity or any of its children. See more in readme.
| folderId   | String     | Single folder id.
| title      | String     | Folder title (maximum length is 255 characters).
| listIds    | String     | list of ids.

## Wunderlist.deleteFolder
Delete a Folder permanently.

| Field      | Type       | Description
|------------|------------|----------
| clientId   | credentials|  The Client ID you received from Wunderlist when you registered your application.
| accessToken| String     | OAuth token for the current user.
| revision   | Number     | Every entity in the Wunderlist API has a read-only revision property. This property is an integer which is updated in response to changes to that entity or any of its children. See more in readme.
| folderId   | String     | Single folder id which will be deleted.

## Wunderlist.getFolderRevisions
Every entity in the Wunderlist API has a read-only revision property. This property is an integer which is updated in response to changes to that entity or any of its children. When the title of a task is changed, that task’s revision is updated—as well as the revisions of all of the parent items of that task, including list and root entities.See more in readme.

| Field      | Type       | Description
|------------|------------|----------
| clientId   | credentials|  The Client ID you received from Wunderlist when you registered your application.
| accessToken| String     | OAuth token for the current user.

## Wunderlist.getAllLists
Get all Lists a user has permission to.

| Field      | Type       | Description
|------------|------------|----------
| clientId   | credentials|  The Client ID you received from Wunderlist when you registered your application.
| accessToken| String     | OAuth token for the current user.

## Wunderlist.getList
Get a specific List.

| Field      | Type       | Description
|------------|------------|----------
| clientId   | credentials|  The Client ID you received from Wunderlist when you registered your application.
| accessToken| String     | OAuth token for the current user.
| listId     | Number     | Single list id.

## Wunderlist.createList
Create a list.

| Field      | Type       | Description
|------------|------------|----------
| clientId   | credentials|  The Client ID you received from Wunderlist when you registered your application.
| accessToken| String     | OAuth token for the current user.
| title      | String     | Folder title (maximum length is 255 characters).

## Wunderlist.updateList
Update a list by overwriting properties.

| Field      | Type       | Description
|------------|------------|----------
| clientId   | credentials|  The Client ID you received from Wunderlist when you registered your application.
| accessToken| String     | OAuth token for the current user.
| revision   | Number     | Every entity in the Wunderlist API has a read-only revision property. This property is an integer which is updated in response to changes to that entity or any of its children. See more in readme.
| title      | String     | Folder title (maximum length is 255 characters).
| listId     | Number     | Folder title (maximum length is 255 characters).

## Wunderlist.deleteList
Delete a list permanently.

| Field      | Type       | Description
|------------|------------|----------
| clientId   | credentials|  The Client ID you received from Wunderlist when you registered your application.
| accessToken| String     | OAuth token for the current user.
| revision   | Number     | Every entity in the Wunderlist API has a read-only revision property. This property is an integer which is updated in response to changes to that entity or any of its children. See more in readme.
| listId     | Number     | Folder title (maximum length is 255 characters).

## Wunderlist.getMembershipsForList
Get Memberships for a List or the current User.

| Field      | Type       | Description
|------------|------------|----------
| clientId   | credentials|  The Client ID you received from Wunderlist when you registered your application.
| accessToken| String     | OAuth token for the current user.

## Wunderlist.AddMemberToListById
Add a Member to a List by id.

| Field      | Type       | Description
|------------|------------|----------
| clientId   | credentials|  The Client ID you received from Wunderlist when you registered your application.
| accessToken| String     | OAuth token for the current user.
| listId     | Number     | Single list id.
| userId     | Number     | Single user id.
| muted      | Select     | Set true for user muted.

## Wunderlist.AddMemberToListByEmail
Add a Member to a List by Email.

| Field      | Type       | Description
|------------|------------|----------
| clientId   | credentials|  The Client ID you received from Wunderlist when you registered your application.
| accessToken| String     | OAuth token for the current user.
| listId     | Number     | Single list id.
| email      | String     | Single user email.
| muted      | Select     | Set true for user muted.

## Wunderlist.markMemberAsAccepted
Mark a Member as accepted.

| Field      | Type       | Description
|------------|------------|----------
| clientId   | credentials|  The Client ID you received from Wunderlist when you registered your application.
| accessToken| String     | OAuth token for the current user.
| revision   | Number     | Every entity in the Wunderlist API has a read-only revision property. This property is an integer which is updated in response to changes to that entity or any of its children. See more in readme.
| member_id  | Number     | Single member id.
| muted      | Select     | Set true for user muted.

## Wunderlist.removeMemberFromList
Remove a Member from a List.

| Field      | Type       | Description
|------------|------------|----------
| clientId   | credentials|  The Client ID you received from Wunderlist when you registered your application.
| accessToken| String     | OAuth token for the current user.
| revision   | Number     | Every entity in the Wunderlist API has a read-only revision property. This property is an integer which is updated in response to changes to that entity or any of its children. See more in readme.
| member_id  | Number     | Single member id.

## Wunderlist.rejectInviteList
Reject an invite to a List.

| Field      | Type       | Description
|------------|------------|----------
| clientId   | credentials|  The Client ID you received from Wunderlist when you registered your application.
| accessToken| String     | OAuth token for the current user.
| revision   | Number     | Every entity in the Wunderlist API has a read-only revision property. This property is an integer which is updated in response to changes to that entity or any of its children. See more in readme.
| member_id  | Number     | Single member id.

## Wunderlist.getTaskNotes
Get the Notes for a Task.A note is a large text blobs belonging to tasks.

| Field      | Type       | Description
|------------|------------|----------
| clientId   | credentials|  The Client ID you received from Wunderlist when you registered your application.
| accessToken| String     | OAuth token for the current user.
| taskId     | Number     | Single task id.

## Wunderlist.getListNotes
Get the Notes for a List.A note is a large text blobs belonging to tasks.

| Field      | Type       | Description
|------------|------------|----------
| clientId   | credentials|  The Client ID you received from Wunderlist when you registered your application.
| accessToken| String     | OAuth token for the current user.
| listId     | Number     | Single task id.

## Wunderlist.getNote
Get a specific note.A note is a large text blobs belonging to tasks.

| Field      | Type       | Description
|------------|------------|----------
| clientId   | credentials|  The Client ID you received from Wunderlist when you registered your application.
| accessToken| String     | OAuth token for the current user.
| noteId     | Number     | Single note id.

## Wunderlist.createNote
Create a note.A note is a large text blobs belonging to tasks.

| Field      | Type       | Description
|------------|------------|----------
| clientId   | credentials|  The Client ID you received from Wunderlist when you registered your application.
| accessToken| String     | OAuth token for the current user.
| taskId     | Number     | Single task id.
| noteContent| String     | Content of note.

## Wunderlist.updateNote
Update a note by overwriting properties.

| Field      | Type       | Description
|------------|------------|----------
| clientId   | credentials|  The Client ID you received from Wunderlist when you registered your application.
| accessToken| String     | OAuth token for the current user.
| noteId     | Number     | Single note id.
| noteContent| String     | Content of note.
| revision   | Number     | Every entity in the Wunderlist API has a read-only revision property. This property is an integer which is updated in response to changes to that entity or any of its children. See more in readme.

## Wunderlist.deleteNote
Delete a note.

| Field      | Type       | Description
|------------|------------|----------
| clientId   | credentials|  The Client ID you received from Wunderlist when you registered your application.
| accessToken| String     | OAuth token for the current user.
| noteId     | Number     | Single note id.
| revision   | Number     | Every entity in the Wunderlist API has a read-only revision property. This property is an integer which is updated in response to changes to that entity or any of its children. See more in readme.

## Wunderlist.getPositionsForUserLists
Get Positions for a user's lists.A list of ordered, unique integers related to a users's lists or a list's tasks or a task's subtasks.

| Field      | Type       | Description
|------------|------------|----------
| clientId   | credentials|  The Client ID you received from Wunderlist when you registered your application.
| accessToken| String     | OAuth token for the current user.

## Wunderlist.getListPosition
Get a specific list position.A list of ordered, unique integers related to a users's lists or a list's tasks or a task's subtasks.

| Field         | Type       | Description
|---------------|------------|----------
| clientId      | credentials|  The Client ID you received from Wunderlist when you registered your application.
| accessToken   | String     | OAuth token for the current user.
| listPositionId| Number     | Single list position id.

## Wunderlist.updatePositionsForUserLists
Update Positions for a user's lists.A list of ordered, unique integers related to a users's lists or a list's tasks or a task's subtasks.

| Field         | Type       | Description
|---------------|------------|----------
| clientId      | credentials|  The Client ID you received from Wunderlist when you registered your application.
| accessToken   | String     | OAuth token for the current user.
| positionListId| Number     | Single position list id.
|  listIds      | List       | Single position list id.
| revision      | Number     | Every entity in the Wunderlist API has a read-only revision property. This property is an integer which is updated in response to changes to that entity or any of its children. See more in readme.

## Wunderlist.getPositionsForListTasks
Get Positions for a list's tasks.A list of ordered, unique integers related to a users's lists or a list's tasks or a task's subtasks.

| Field      | Type       | Description
|------------|------------|----------
| clientId   | credentials|  The Client ID you received from Wunderlist when you registered your application.
| accessToken| String     | OAuth token for the current user.
| listId     | Number     | Single list id.

## Wunderlist.getTaskPosition
Get a specific task position.A list of ordered, unique integers related to a users's lists or a list's tasks or a task's subtasks.

| Field      | Type       | Description
|------------|------------|----------
| clientId   | credentials|  The Client ID you received from Wunderlist when you registered your application.
| accessToken| String     | OAuth token for the current user.
| taskId     | Number     | Single task id.

## Wunderlist.updatePositionsForListTasks
Update Positions for a list's tasks.A list of ordered, unique integers related to a users's lists or a list's tasks or a task's subtasks.

| Field         | Type       | Description
|---------------|------------|----------
| clientId      | credentials|  The Client ID you received from Wunderlist when you registered your application.
| accessToken   | String     | OAuth token for the current user.
| positionListId| Number     | Single position list id.
|  listIds      | List       | Single position list id.
| revision      | Number     | Every entity in the Wunderlist API has a read-only revision property. This property is an integer which is updated in response to changes to that entity or any of its children. See more in readme.

## Wunderlist.getPositionsForTaskSubtasksByTaskId
Get Positions for a task's subtasks.A list of ordered, unique integers related to a users's lists or a list's tasks or a task's subtasks.

| Field      | Type       | Description
|------------|------------|----------
| clientId   | credentials|  The Client ID you received from Wunderlist when you registered your application.
| accessToken| String     | OAuth token for the current user.
| taskId     | Number     | Single task id.

## Wunderlist.getSpecificSubtaskPosition
Get a specific subtask position.A list of ordered, unique integers related to a users's lists or a list's tasks or a task's subtasks.

| Field      | Type       | Description
|------------|------------|----------
| clientId   | credentials|  The Client ID you received from Wunderlist when you registered your application.
| accessToken| String     | OAuth token for the current user.
| subtaskId  | Number     | Single subtask id.

## Wunderlist.updatePositionsForTaskSubtasks
Update Positions for a task's subtasks.A list of ordered, unique integers related to a users's lists or a list's tasks or a task's subtasks.

| Field        | Type       | Description
|--------------|------------|----------
| clientId     | credentials|  The Client ID you received from Wunderlist when you registered your application.
| accessToken  | String     | OAuth token for the current user.
| subtaskId    | Number     | Single subtask id.
|  PositionsIds| List       | Single position list id.
| revision     | Number     | Every entity in the Wunderlist API has a read-only revision property. This property is an integer which is updated in response to changes to that entity or any of its children. See more in readme.

## Wunderlist.getRemindersForTask
Get Reminders for a Task.

| Field      | Type       | Description
|------------|------------|----------
| clientId   | credentials|  The Client ID you received from Wunderlist when you registered your application.
| accessToken| String     | OAuth token for the current user.
| taskId     | Number     | Single task id.

## Wunderlist.getRemindersForTList
Get Reminders for a List.

| Field      | Type       | Description
|------------|------------|----------
| clientId   | credentials|  The Client ID you received from Wunderlist when you registered your application.
| accessToken| String     | OAuth token for the current user.
| listId     | Number     | Single list id.

## Wunderlist.createReminder
Create a Reminder.

| Field              | Type       | Description
|--------------------|------------|----------
| clientId           | credentials|  The Client ID you received from Wunderlist when you registered your application.
| accessToken        | String     | OAuth token for the current user.
| taskId             | Number     | Single task id.
| date               | DatePicker | Date for task.
| createdByDeviceUdid| DatePicker | Can be set to not schedule any reminder push notification for that device and that newly created reminder. This is mostly used by iOS, because they schedule a local reminder as well to have offline support.

## Wunderlist.updateReminder
Update a Reminder.

| Field      | Type       | Description
|------------|------------|----------
| clientId   | credentials|  The Client ID you received from Wunderlist when you registered your application.
| accessToken| String     | OAuth token for the current user.
| reminderId | Number     | Single reminder id.
| date       | DatePicker | Date for task.
| revision   | Number     | Every entity in the Wunderlist API has a read-only revision property. This property is an integer which is updated in response to changes to that entity or any of its children. See more in readme.

## Wunderlist.deleteReminder
Delete a Reminder.

| Field      | Type       | Description
|------------|------------|----------
| clientId   | credentials|  The Client ID you received from Wunderlist when you registered your application.
| accessToken| String     | OAuth token for the current user.
| reminderId | Number     | Single reminder id.
| revision   | Number     | Every entity in the Wunderlist API has a read-only revision property. This property is an integer which is updated in response to changes to that entity or any of its children. See more in readme.

## Wunderlist.getRootForCurrentUser
Fetch the Root for the current User.Root is the top-level entity in the sync hierarchy.

| Field      | Type       | Description
|------------|------------|----------
| clientId   | credentials|  The Client ID you received from Wunderlist when you registered your application.
| accessToken| String     | OAuth token for the current user.

## Wunderlist.getSubtasksForTask
Get Subtasks for a Task.Subtasks are children of tasks.

| Field      | Type       | Description
|------------|------------|----------
| clientId   | credentials|  The Client ID you received from Wunderlist when you registered your application.
| accessToken| String     | OAuth token for the current user.
| taskId     | Number     | Single task id.

## Wunderlist.getSubtasksForList
Get Subtasks for a List.Subtasks are children of tasks.

| Field      | Type       | Description
|------------|------------|----------
| clientId   | credentials|  The Client ID you received from Wunderlist when you registered your application.
| accessToken| String     | OAuth token for the current user.
| listId     | Number     | Single list id.

## Wunderlist.getCompletedSubtasksForList
Get Completed Subtasks.Subtasks are children of tasks.

| Field      | Type       | Description
|------------|------------|----------
| clientId   | credentials|  The Client ID you received from Wunderlist when you registered your application.
| accessToken| String     | OAuth token for the current user.
| listId     | Number     | Single list id.
| completed  | Select     | If set `true` - Get Completed Subtasks.If set `false` - Get uncompleted Subtasks.

## Wunderlist.getCompletedSubtasksForTask
Get Completed Subtasks for a Task.Subtasks are children of tasks.

| Field      | Type       | Description
|------------|------------|----------
| clientId   | credentials|  The Client ID you received from Wunderlist when you registered your application.
| accessToken| String     | OAuth token for the current user.
| taskId     | Number     | Single task id.
| completed  | Select     | If set `true` - Get Completed Subtasks.If set `false` - Get uncompleted Subtasks.

## Wunderlist.getSpecificSubtask
Get a specific subtask.Subtasks are children of tasks.

| Field      | Type       | Description
|------------|------------|----------
| clientId   | credentials|  The Client ID you received from Wunderlist when you registered your application.
| accessToken| String     | OAuth token for the current user.
| subtaskId  | Number     | Single subtask id.

## Wunderlist.createSubtask
Create a subtask.Subtasks are children of tasks.

| Field      | Type       | Description
|------------|------------|----------
| clientId   | credentials|  The Client ID you received from Wunderlist when you registered your application.
| accessToken| String     | OAuth token for the current user.
| taskId     | Number     | Single task id.
| title      | String     | Title of subtask.Maximum length is 255
| completed  | Select     | If set `true` - Completed Subtasks.If set `false` - uncompleted Subtasks.

## Wunderlist.updateSubtask
Update a subtask by overwriting properties.Subtasks are children of tasks.

| Field      | Type       | Description
|------------|------------|----------
| clientId   | credentials|  The Client ID you received from Wunderlist when you registered your application.
| accessToken| String     | OAuth token for the current user.
| taskId     | Number     | Single task id.
| title      | String     | Title of subtask.Maximum length is 255
| completed  | Select     | If set `true` - Completed Subtasks.If set `false` - uncompleted Subtasks.
| revision   | Number     | Every entity in the Wunderlist API has a read-only revision property. This property is an integer which is updated in response to changes to that entity or any of its children. See more in readme.

## Wunderlist.deleteSubtask
Delete a subtask.Subtasks are children of tasks.

| Field      | Type       | Description
|------------|------------|----------
| clientId   | credentials|  The Client ID you received from Wunderlist when you registered your application.
| accessToken| String     | OAuth token for the current user.
| taskId     | Number     | Single task id.
| revision   | Number     | Every entity in the Wunderlist API has a read-only revision property. This property is an integer which is updated in response to changes to that entity or any of its children. See more in readme.

## Wunderlist.GetTasksForList
Get Tasks for a List.Tasks are children of lists.

| Field      | Type       | Description
|------------|------------|----------
| clientId   | credentials|  The Client ID you received from Wunderlist when you registered your application.
| accessToken| String     | OAuth token for the current user.
| listId     | Number     | Single list id.

## Wunderlist.GetCompletedTasksForList
Get Completed Tasks.Tasks are children of lists.

| Field      | Type       | Description
|------------|------------|----------
| clientId   | credentials|  The Client ID you received from Wunderlist when you registered your application.
| accessToken| String     | OAuth token for the current user.
| listId     | Number     | Single list id.
| completed  | Select     | If set `true` - Get Completed Subtasks.If set `false` - Get uncompleted Subtasks.

## Wunderlist.GetSpecificTask
Get a specific task.Tasks are children of lists.

| Field      | Type       | Description
|------------|------------|----------
| clientId   | credentials|  The Client ID you received from Wunderlist when you registered your application.
| accessToken| String     | OAuth token for the current user.
| taskId     | Number     | Single task id.

## Wunderlist.createTask
Create a task.Tasks are children of lists.

| Field          | Type       | Description
|----------------|------------|----------
| clientId       | credentials|  The Client ID you received from Wunderlist when you registered your application.
| accessToken    | String     | OAuth token for the current user.
| listId         | Number     | Single list id.
| title          | String     | Task title (maximum length is 255 characters).
| assigneeId     | Number     | Single assignee id.
| completed      | Select     | If set `true` - Get Completed Subtasks.If set `false` - Get uncompleted Subtasks.
| recurrenceType | Select     | Must be accompanied by recurrenceCount.
| recurrenceCount| Number     | must be >= 1, must be accompanied by recurrenceType.
| dueDate        | datePicker | Task date.
| starred        | Select     | 

## Wunderlist.updateTask
Update a task by overwriting properties.Tasks are children of lists.

| Field          | Type       | Description
|----------------|------------|----------
| clientId       | credentials|  The Client ID you received from Wunderlist when you registered your application.
| accessToken    | String     | OAuth token for the current user.
| taskId         | Number     | Task id which will be updated.
| listId         | Number     | Can be given to move the Task into a different List.
| title          | String     | Task title (maximum length is 255 characters).
| revision       | Number     | Every entity in the Wunderlist API has a read-only revision property. This property is an integer which is updated in response to changes to that entity or any of its children. See more in readme.
| assigneeId     | Number     | Single assignee id.
| completed      | Select     | If set `true` - Get Completed Subtasks.If set `false` - Get uncompleted Subtasks.
| recurrenceType | Select     | Must be accompanied by recurrenceCount.
| recurrenceCount| Number     | must be >= 1, must be accompanied by recurrenceType.
| dueDate        | datePicker | Task date.
| starred        | Select     | 
| remove         | String     | An list of attributes to delete from the task, e.g. 'dueDate'

## Wunderlist.deleteTask
Delete a task.Tasks are children of lists.

| Field      | Type       | Description
|------------|------------|----------
| clientId   | credentials|  The Client ID you received from Wunderlist when you registered your application.
| accessToken| String     | OAuth token for the current user.
| taskId     | Number     | Task id which will be updated.
| revision   | Number     | Every entity in the Wunderlist API has a read-only revision property. This property is an integer which is updated in response to changes to that entity or any of its children. See more in readme.

## Wunderlist.getCommentsForTask
Get the Comments for a Task.A taskComment is a comment that belongs to a task.

| Field      | Type       | Description
|------------|------------|----------
| clientId   | credentials|  The Client ID you received from Wunderlist when you registered your application.
| accessToken| String     | OAuth token for the current user.
| taskId     | Number     | Task comment id which will be read.

## Wunderlist.getCommentsForList
Get the Comments for a List.A taskComment is a comment that belongs to a task.

| Field      | Type       | Description
|------------|------------|----------
| clientId   | credentials|  The Client ID you received from Wunderlist when you registered your application.
| accessToken| String     | OAuth token for the current user.
| listId     | Number     | List comment id which will be read.

## Wunderlist.getSpecificComment
Get a specific Comment.A taskComment is a comment that belongs to a task.

| Field      | Type       | Description
|------------|------------|----------
| clientId   | credentials|  The Client ID you received from Wunderlist when you registered your application.
| accessToken| String     | OAuth token for the current user.
| commentId  | Number     | Single comment id which will be read.

## Wunderlist.createComment
Create a Comment.A taskComment is a comment that belongs to a task.

| Field      | Type       | Description
|------------|------------|----------
| clientId   | credentials|  The Client ID you received from Wunderlist when you registered your application.
| accessToken| String     | OAuth token for the current user.
| taskId     | Number     | Single task id which will be added comment.
| text       | String     | Text for comment.

## Wunderlist.getCurrentlyLoggedUser
Fetch the currently logged in user.All info related to the currently signed in user.

| Field      | Type       | Description
|------------|------------|----------
| clientId   | credentials|  The Client ID you received from Wunderlist when you registered your application.
| accessToken| String     | OAuth token for the current user.

## Wunderlist.getUserAccessForList
Fetch the users this user can access.All info related to the currently signed in user.

| Field      | Type       | Description
|------------|------------|----------
| clientId   | credentials|  The Client ID you received from Wunderlist when you registered your application.
| accessToken| String     | OAuth token for the current user.
| listId     | Number     | Restricts the list of returned users to only those who have access to a particular list.

## Wunderlist.getAllWebhooks
Get all webhooks for a list.A webhook sends notifications when a list is updated.

| Field      | Type       | Description
|------------|------------|----------
| clientId   | credentials|  The Client ID you received from Wunderlist when you registered your application.
| accessToken| String     | OAuth token for the current user.
| listId     | Number     | Restricts the list of returned webhooks.

## Wunderlist.createWebhook
Create a Webhook.A webhook sends notifications when a list is updated.

| Field        | Type       | Description
|--------------|------------|----------
| clientId     | credentials|  The Client ID you received from Wunderlist when you registered your application.
| accessToken  | String     | OAuth token for the current user.
| listId       | Number     | Restricts the list of returned webhooks.
| webhookUrl   | String     | Callback url for webhook.Maximum length is 255 characters.
| processorType| String     | can be ''''.
| configuration| String     | Example. - generic.

## Wunderlist.deleteWebhook
Delete a Webhook.A webhook sends notifications when a list is updated.

| Field      | Type       | Description
|------------|------------|----------
| clientId   | credentials|  The Client ID you received from Wunderlist when you registered your application.
| accessToken| String     | OAuth token for the current user.
| webhookId  | Number     | Webhook id which will be deleted.
| revision   | Number     | Every entity in the Wunderlist API has a read-only revision property. This property is an integer which is updated in response to changes to that entity or any of its children. See more in readme.

## Wunderlist.getFilesForTask
Get Files for a Task.The first resource that needs to be created to upload a file is the Upload resource. After the upload is finished you need to create a new File resource that will published via real time to all the other members of the List you are creating the File in.

| Field      | Type       | Description
|------------|------------|----------
| clientId   | credentials|  The Client ID you received from Wunderlist when you registered your application.
| accessToken| String     | OAuth token for the current user.
| taskId     | Number     | Single task id.

## Wunderlist.getFilesForList
Get Files for a Task.The first resource that needs to be created to upload a file is the Upload resource. After the upload is finished you need to create a new File resource that will published via real time to all the other members of the List you are creating the File in.

| Field      | Type       | Description
|------------|------------|----------
| clientId   | credentials|  The Client ID you received from Wunderlist when you registered your application.
| accessToken| String     | OAuth token for the current user.
| listId     | Number     | Single list id.

## Wunderlist.getSpecificFile
Get a specific File.The first resource that needs to be created to upload a file is the Upload resource. After the upload is finished you need to create a new File resource that will published via real time to all the other members of the List you are creating the File in.

| Field      | Type       | Description
|------------|------------|----------
| clientId   | credentials|  The Client ID you received from Wunderlist when you registered your application.
| accessToken| String     | OAuth token for the current user.
| fileId     | Number     | File id which will be returned.

## Wunderlist.createFile
Create a File.The first resource that needs to be created to upload a file is the Upload resource. After the upload is finished you need to create a new File resource that will published via real time to all the other members of the List you are creating the File in.

| Field         | Type       | Description
|---------------|------------|----------
| clientId      | credentials|  The Client ID you received from Wunderlist when you registered your application.
| accessToken   | String     | OAuth token for the current user.
| uploadId      | Number     | Upload id which will be attached.
| taskId        | Number     | Single task id.
| localCreatedAt| DatePicker | For creating files we have introduced the :localCreatedAt from comments again. This attribute will help us later to sort the files and comments in the right order. 

## Wunderlist.deleteFile
Destroy a File.The first resource that needs to be created to upload a file is the Upload resource. After the upload is finished you need to create a new File resource that will published via real time to all the other members of the List you are creating the File in.

| Field      | Type       | Description
|------------|------------|----------
| clientId   | credentials|  The Client ID you received from Wunderlist when you registered your application.
| accessToken| String     | OAuth token for the current user.
| fileId     | Number     | File id which will be returned.
| revision   | Number     | Every entity in the Wunderlist API has a read-only revision property. This property is an integer which is updated in response to changes to that entity or any of its children. See more in readme.

## Wunderlist.getPreviewOfFile
A file preview is an image thumbnail for a file.The preview endpoint will generate a preview image on-demand for the given file. This endpoint only works with images for now.See more in readme.

| Field      | Type       | Description
|------------|------------|----------
| clientId   | credentials|  The Client ID you received from Wunderlist when you registered your application.
| accessToken| String     | OAuth token for the current user.
| fileId     | Number     | File id which will be returned.
| platform   | Select     | Platform for preview.
| size       | Select     | Size for preview.

## Wunderlist.createUpload
The first resource that needs to be created to upload a file is the Upload resource. After the upload is finished you need to create a new File resource that will published via real time to all the other members of the List you are creating the File in.

| Field      | Type       | Description
|------------|------------|----------
| clientId   | credentials|  The Client ID you received from Wunderlist when you registered your application.
| accessToken| String     | OAuth token for the current user.
| uploadFile | File       | Upload file.
| partNumber | Number     | The partNumber attribute always starts with 1, never with 0. The expiresAt date represents the lifetime of the given part.
| md5sum     | String     | Md5 hash.

## Wunderlist.getUploadParts
Fetching new parts for the chunked upload.If you need more than one part to upload the new file you need to call the following endpoint to get another one.

| Field      | Type       | Description
|------------|------------|----------
| clientId   | credentials|  The Client ID you received from Wunderlist when you registered your application.
| accessToken| String     | OAuth token for the current user.
| uploadId   | Number     | Upload id which will be returned.
| partNumber | Number     | The partNumber attribute always starts with 1, never with 0. The expiresAt date represents the lifetime of the given part.
| md5sum     | String     | Md5 hash.

## Wunderlist.markUploadAsFinished
Mark the upload as finished.

| Field      | Type       | Description
|------------|------------|----------
| clientId   | credentials|  The Client ID you received from Wunderlist when you registered your application.
| accessToken| String     | OAuth token for the current user.
| uploadId   | Number     | Upload id which will be returned.

