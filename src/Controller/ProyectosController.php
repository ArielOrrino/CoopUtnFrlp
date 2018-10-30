<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Proyectos Controller
 *
 * @property \App\Model\Table\ProyectosTable $Proyectos
 *
 * @method \App\Model\Entity\Proyecto[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ProyectosController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $proyectos = $this->paginate($this->Proyectos);

        $this->set(compact('proyectos'));
    }

    /**
     * View method
     *
     * @param string|null $id Proyecto id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $proyecto = $this->Proyectos->get($id, [
            'contain' => []
        ]);

        $this->set('proyecto', $proyecto);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $proyecto = $this->Proyectos->newEntity();
        if ($this->request->is('post')) {
            $proyecto = $this->Proyectos->patchEntity($proyecto, $this->request->getData());
            if ($this->Proyectos->save($proyecto)) {
                $this->Flash->success(__('El proyecto ha sido agregado con exito.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('El proyecto no ha podido ser guardado.'));
        }
        $this->set(compact('proyecto'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Proyecto id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $proyecto = $this->Proyectos->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $proyecto = $this->Proyectos->patchEntity($proyecto, $this->request->getData());
            if ($this->Proyectos->save($proyecto)) {
                $this->Flash->success(__('El proyecto ha sido agregado con exito.'));

                if ($proyecto->fecha_finalizado == null){
                    return $this->redirect(['action' => 'index']);
                }
                else
                    return $this->redirect(array('controller' => 'Usuarios', 'action' => 'notifica'));
                }

            $this->Flash->error(__('El proyecto no ha podido ser guardado.'));
        }
        $this->set(compact('proyecto'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Proyecto id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $proyecto = $this->Proyectos->get($id);
        if ($this->Proyectos->delete($proyecto)) {
            $this->Flash->success(__('El proyecto ha sido eliminado'));
        } else {
            $this->Flash->error(__('El proyecto no ha podido ser eliminado.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function vote($idProyecto = null,$idUser=null)
    {
        $proyecto = $this->Proyectos->get($idProyecto);
        $proyecto->set('cantidad_votos', $proyecto->cantidad_votos + 1);
        $this->log($idProyecto);
        $this->log($idUser);
        $this->Proyectos->save($proyecto);     
        $this->redirect(array('controller' => 'Usuarios', 'action' => 'actualizarVoto', $idUser,$proyecto->idproyectos));
    }

    public function votos()
    {
        $proyectos = $this->paginate($this->Proyectos);

        $this->set(compact('proyectos'));
    }

}
