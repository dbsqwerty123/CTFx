<?php

require('../../include/mellivora.inc.php');

enforce_authentication(CONST_USER_CLASS_MODERATOR);

head('User types');
menu_management();
section_title('Users types', button_link('New User Type', 'new_user_type'), false);
echo '
    <table id="files" class="table table-striped table-hover">
      <thead>
        <tr>
          <th>Title</th>
          <th>Description</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
    ';

$types = db_query_fetch_all('SELECT * FROM user_types ORDER BY title ASC');

foreach ($types as $type) {
	echo '
    <tr>
        <td>', htmlspecialchars($type['title']), '</td>
        <td>', short_description($type['description'], 50), '</td>
        <td><a href="edit_user_type.php?id=', htmlspecialchars($type['id']), '" class="btn btn-xs btn-2">✎</a></td>
    </tr>
    ';
}

echo '
      </tbody>
    </table>
     ';

foot();
