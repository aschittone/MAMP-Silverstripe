<?php

use SilverStripe\Forms\Form;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\TextField;
use SilverStripe\Forms\HiddenField;
use SilverStripe\Forms\FormAction;
use SilverStripe\Forms\RequiredFields;
use SilverStripe\Control\HTTPRequest;

class TaskPageController extends PageController
{
    /**
     * An array of actions that can be accessed via a request. Each array element should be an action name, and the
     * permissions or conditions required to allow the user to access it.
     *
     * <code>
     * [
     *     'action', // anyone can access this action
     *     'action' => true, // same as above
     *     'action' => 'ADMIN', // you must have ADMIN permissions to access this action
     *     'action' => '->checkAction' // you can only access this action if $this->checkAction() returns true
     * ];
     * </code>
     *
     * @var array
     */
    private static $allowed_actions = [
    	'user',
        'delete',
        'NewTaskForm'
    ];

    protected function init()
    {
        parent::init();
        // You can include any CSS or JS required by your project here.
        // See: https://docs.silverstripe.org/en/developer_guides/templates/requirements/
    }

    public function user(HTTPRequest $request)
    {
        $user = TaskUser::get()->byID($request->param('ID'));

        if (!$user) {
            return $this->httpError(404,'That user could not be found');
        }

        return ['TaskUser' => $user];
    }

    public function delete(HTTPRequest $request)
    {
        $task = Task::get()->byID($request->param('ID'));

        if (!$task) {
            return $this->httpError(404,'That task could not be found');
        }

        $task->delete();

        if ($request->isAjax()) {
            return "AJAX response!";
        }

        return $this->redirectBack();
    }

    public function NewTaskForm()
    {
        $form = Form::create(
            $this,
            __FUNCTION__,
            FieldList::create(
                TextField::create('Title', ''),
                HiddenField::create('TaskUserID', null, $this->request->param('ID'))
            ),
            FieldList::create(
                FormAction::create('createNewTask','Add Task')
            ),
            RequiredFields::create('Title', 'TaskUserID')
        );

        return $form;
    }

    public function createNewTask($data, $form)
    {
        if (isset($data['Title']) && isset($data['TaskUserID'])) {
            $task = Task::create([
                'Title' => $data['Title'],
                'TaskUserID' => $data['TaskUserID']
            ]);

            if ($task->write()) {
                $form->sessionMessage('New task added!','good');
            } else {
                $form->sessionMessage('Error trying to add task.','bad');
            }
        } else {
            $form->sessionMessage('Can\'t add task, missing information.','bad');
        }

        return $this->redirectBack();
    }

}