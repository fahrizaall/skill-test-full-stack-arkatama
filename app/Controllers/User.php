<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\RESTful\ResourceController;

class User extends ResourceController
{
    protected $userModel;
    public function __construct()
    {
        $this->userModel = new UserModel();
    }
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index()
    {
        $data['users'] = $this->userModel->orderBy('id', 'ASC')->findAll();

        return view('user_list', $data);
    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id = null)
    {
        $data['user'] = $this->userModel->where('id', $id)->first();

        return view('show_user', $data);
    }

    /**
     * Return a new resource object, with default properties
     *
     * @return mixed
     */
    public function new()
    {
        $input_data = str_replace(['TAHUN', 'THN', 'TH'], "", strtoupper($this->request->getVar('data')));
        $user_input = preg_split('/(\d+)/', $input_data, -1, PREG_SPLIT_DELIM_CAPTURE);
        
        $data = [
            'name' => $user_input[0],
            'age' => $user_input[1],
            'city' => $user_input[2]
        ];

        $this->userModel->save($data);

        return $this->response->redirect(site_url('users-list'));
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        return view('add_user');
    }

    /**
     * Return the editable properties of a resource object
     *
     * @return mixed
     */
    public function edit($id = null)
    {
        $datauser = $this->userModel->where('id', $id)->first();
        $data['user'] = [
            'id' => $datauser['id'],
            'data' => $datauser['name'] . ' ' . $datauser['age'] . ' ' . $datauser['city'] 
        ];

        return view('edit_user', $data);
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($id = null)
    {
        $input_data = str_replace(['TAHUN', 'THN', 'TH'], "", strtoupper($this->request->getVar('data')));
        $user_input = preg_split('/(\d+)/', $input_data, -1, PREG_SPLIT_DELIM_CAPTURE);
        
        $data = [
            'id' => $id,
            'name' => $user_input[0],
            'age' => $user_input[1],
            'city' => $user_input[2]
        ];

        $this->userModel->save($data);

        return $this->response->redirect(site_url('users-list'));
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        $this->userModel->where('id', $id)->delete($id);

        return $this->response->redirect(site_url('users-list'));
    }
}
