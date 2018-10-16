<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Usuarios Controller
 *
 * @property \App\Model\Table\UsuariosTable $Usuarios
 *
 * @method \App\Model\Entity\Usuario[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsuariosController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function home() {
         $this->render();
    }

    public function login()
    {
         if ($this->request->is('post'))
          {
              $user= $this->Auth->identify();              
             if($user)
               {                    
                    $this->Auth->setUser($user);
                    return $this->redirect($this->Auth->redirectUrl());
                }
                else 
                {                    
                    $this->Flash->error('Usuario y/o contraseña incorrectos, vuelva a intentar');
                }
            }
    }

    public function logout()
    {
        return $this->redirect($this->Auth->logout());
    }



    public function index()
    {
        $usuarios = $this->paginate($this->Usuarios);

        $this->set(compact('usuarios'));
    }

    /**
     * View method
     *
     * @param string|null $id Usuario id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $usuario = $this->Usuarios->get($id, [
            'contain' => []
        ]);

        $this->set('usuario', $usuario);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $usuario = $this->Usuarios->newEntity();
        if ($this->request->is('post')) {
            $usuario = $this->Usuarios->patchEntity($usuario, $this->request->getData());
            if ($this->Usuarios->save($usuario)) {
                $this->Flash->success(__('Usuario Grabado con exito.'));

                return $this->redirect(['controller'=>'pages','action' => 'home']);
            }
            $this->Flash->error(__('El usuario no pudo ser grabado.'));
        }
        $this->set(compact('usuario'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Usuario id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $usuario = $this->Usuarios->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $usuario = $this->Usuarios->patchEntity($usuario, $this->request->getData());
            if ($this->Usuarios->save($usuario)) {
                $this->Flash->success(__('Modificaciones grabadas con exito.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Las modificaciones no pudieron ser grabadas.'));
        }
        $this->set(compact('usuario'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Usuario id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $usuario = $this->Usuarios->get($id);
        if ($this->Usuarios->delete($usuario)) {
            $this->Flash->success(__('El usuario ha sido eliminado correctamente.'));
        } else {
            $this->Flash->error(__('El usuario no pudo ser eliminado.'));
        }

        return $this->redirect(['action' => 'index']);
    }

     public function actualizarVoto($id = null,$voto=null)
    {
        $usuario = $this->Usuarios->get($id, [
            'contain' => []
        ]);

         $usuario->set('voto', $voto);
         $this->Usuarios->save($usuario);
         $this->set(compact('usuario'));
         $this->log($this->Auth->user('id_usuarios'));
        $this->log($usuario->id_usuarios);
         if ($this->Auth->user('id_usuarios') === $usuario->id_usuarios) {
             $data = $usuario->toArray();
              $this->log($data);
             $this->Auth->setUser($data);
             $this->log($this->Auth->user('voto'));
        }
        $this->redirect(array('controller' => 'Proyectos', 'action' => 'votos'));
    }
}
