<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
        $this->load->model("users_model","users");
	}

    public function edit()
    {
        $userId = $this->input->post('editarId');
        $user = $this->users->edit($userId);

        $output= "
        	<form>
            <div class='modal-body'>
                <input type='hidden' class='form-control' id='editId' value='{$user->id}'>
                <div class='form-group'>
                	<label class='control-label' for='name'>Nombre:</label>
                    <input type='text' class='form-control' id='editName' value='{$user->name}'>
                </div>
                <div class='form-group'>
               		<label class='control-label' for='lastname'>Apellidos:</label>
                    <input type='text' class='form-control' id='editLastname' value='{$user->email}'>
                </div>
                <div class='form-group'>
                	<label class='control-label' for='phoneCell'>Teléfono celular:</label>
                    <input type='text' class='form-control' id='editphoneCell' value='{$user->phone}'>
                </div>
                <div class='form-group'>
                    <label class='control-label' for='email'>Email:</label>
                    <input type='text' class='form-control' id='editEmail' value='{$user->rfc}'>
                </div>
                <div class='form-group'>
                    <label class='control-label' for='email'>Email:</label>
                    <input type='text' class='form-control' id='editEmail' value='{$user->notes}'>
                </div>
            </div>
            <div class='modal-footer'>
              <button type='button' class='btn btn-outline-secondary' data-bs-dismiss='modal'>Cerrar</button>
              <button type='button' class='btn btn-outline-primary' id='editSubmit'>Guardar</button>
            </div>
            </form>";

         echo $output;
    }

}
