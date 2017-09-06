<?php
$routes = [
    'metadata',
    'getAccessToken',
    'getUserAvatar',
    'getAllFolders',
    'getFolder',
    'createFolder',
    'updateFolder',
    'deleteFolder',
    'getFolderRevisions',
    'getAllLists',
    'getList',
    'createList',
    'updateList',
    'deleteList',
    'getMembershipsForList',
    'AddMemberToListById',
    'AddMemberToListByEmail',
    'markMemberAsAccepted',
    'removeMemberFromList',
    'rejectInviteList',
    'getTaskNotes',
    'getListNotes',
    'getNote',
    'createNote',
    'updateNote',
    'deleteNote',
    'getPositionsForUserLists',
    'getListPosition',
    'updatePositionsForUserLists',
    'getPositionsForListTasks',
    'getTaskPosition',
    'updatePositionsForListTasks',
    'getPositionsForTaskSubtasksByTaskId',
    'getSpecificSubtaskPosition',
    'updatePositionsForTaskSubtasks',
    'getRemindersForTask',
    'getRemindersForTList',
    'createReminder',
    'updateReminder',
    'deleteReminder',
    'getRootForCurrentUser',
    'getSubtasksForTask',
    'getSubtasksForList',
    'getCompletedSubtasksForList',
    'getCompletedSubtasksForTask',
    'getSpecificSubtask',
    'createSubtask',
    'updateSubtask',
    'deleteSubtask',
    'GetTasksForList',
    'GetCompletedTasksForList',
    'GetSpecificTask',
    'createTask',
    'updateTask',
    'deleteTask',
    'getCommentsForTask',
    'getCommentsForList',
    'getSpecificComment',
    'createComment',
    'getCurrentlyLoggedUser',
    'getUserAccessForList',
    'getAllWebhooks',
    'createWebhook',
    'deleteWebhook',
    'getFilesForTask',
    'getFilesForList',
    'getSpecificFile',
    'createFile',
    'deleteFile',
    'getPreviewOfFile',
    'createUpload',
    'getUploadParts',
    'markUploadAsFinished',
    'uploadFileOnAmazon'
];
foreach($routes as $file) {
    require __DIR__ . '/../src/routes/'.$file.'.php';
}

