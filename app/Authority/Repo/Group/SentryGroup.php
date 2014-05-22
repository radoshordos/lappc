<?php namespace Authority\Repo\Group;

use Cartalyst\Sentry\Sentry;
use Authority\Repo\RepoAbstract;
use Cartalyst\Sentry\Users\LoginRequiredException;
use Cartalyst\Sentry\Users\UserExistsException;
use Cartalyst\Sentry\Groups\NameRequiredException;
use Cartalyst\Sentry\Groups\GroupExistsException;
use Cartalyst\Sentry\Groups\GroupNotFoundException;

class SentryGroup extends RepoAbstract implements GroupInterface
{

    protected $sentry;

    /**
     * Construct a new SentryGroup Object
     */
    public function __construct(Sentry $sentry)
    {
        $this->sentry = $sentry;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store($data)
    {
        // Logic for missing checkbox values
        if (!array_key_exists('adminPermissions', $data)) {
            $data['adminPermissions'] = 0;
        }
        if (!array_key_exists('powerUserPermissions', $data)) {
            $data['powerUserPermissions'] = 0;
        }
        if (!array_key_exists('simpleUserPermissions', $data)) {
            $data['simpleUserPermissions'] = 0;
        }

        $result = array();
        try {
            // Create the group
            $group = $this->sentry->createGroup(array(
                'name' => e($data['name']),
                'permissions' => array(
                    'admin' => e($data['adminPermissions']),
                    'power' => e($data['powerUserPermissions']),
                    'simple' => e($data['simpleUserPermissions']),
                ),
            ));

            $result['success'] = true;
            $result['message'] = trans('groups.created');
        } catch (LoginRequiredException $e) {
            $result['success'] = false;
            $result['message'] = trans('groups.loginreq');
        } catch (UserExistsException $e) {
            $result['success'] = false;
            $result['message'] = trans('groups.userexists');;
        }

        return $result;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update($data)
    {
        // Logic for missing checkbox values
        if (!array_key_exists('adminPermissions', $data)) {
            $data['adminPermissions'] = 0;
        }
        if (!array_key_exists('powerUserPermissions', $data)) {
            $data['powerUserPermissions'] = 0;
        }
        if (!array_key_exists('simpleUserPermissions', $data)) {
            $data['simpleUserPermissions'] = 0;
        }

        try {
            // Find the group using the group id
            $group = $this->sentry->findGroupById($data['id']);

            // Update the group details
            $group->name = e($data['name']);
            $group->permissions = array(
                'admin' => e($data['adminPermissions']),
                'power' => e($data['powerUserPermissions']),
                'simple' => e($data['simpleUserPermissions']),
            );

            // Update the group
            if ($group->save()) {
                // Group information was updated
                $result['success'] = true;
                $result['message'] = trans('groups.updated');;
            } else {
                // Group information was not updated
                $result['success'] = false;
                $result['message'] = trans('groups.updateproblem');;
            }
        } catch (NameRequiredException $e) {
            $result['success'] = false;
            $result['message'] = trans('groups.namereq');;
        } catch (GroupExistsException $e) {
            $result['success'] = false;
            $result['message'] = trans('groups.groupexists');;
        } catch (GroupNotFoundException $e) {
            $result['success'] = false;
            $result['message'] = trans('groups.notfound');
        }

        return $result;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        try {
            // Find the group using the group id
            $group = $this->sentry->findGroupById($id);

            // Delete the group
            $group->delete();
        } catch (GroupNotFoundException $e) {
            return false;
        }
        return true;
    }

    /**
     * Return a specific group by a given id
     *
     * @param  integer $id
     * @return Group
     */
    public function byId($id)
    {
        try {
            $group = $this->sentry->findGroupById($id);
        } catch (GroupNotFoundException $e) {
            return false;
        }
        return $group;
    }

    /**
     * Return a specific group by a given name
     *
     * @param  string $name
     * @return Group
     */
    public function byName($name)
    {
        try {
            $group = $this->sentry->findGroupByName($name);
        } catch (GroupNotFoundException $e) {
            return false;
        }
        return $group;
    }

    /**
     * Return all the registered groups
     *
     * @return stdObject Collection of groups
     */
    public function all()
    {
        return $this->sentry->getGroupProvider()->findAll();
    }
}
