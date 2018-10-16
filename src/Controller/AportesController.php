<?php
namespace App\Controller;

use App\Controller\AppController;
use MercadoPago;
/**
 * Aportes Controller
 *
 * @property \App\Model\Table\AportesTable $Aportes
 *
 * @method \App\Model\Entity\Aporte[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AportesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $aportes = $this->paginate($this->Aportes);

        $this->set(compact('aportes'));
    }

    public function confirm()
    {
        $aporte = $this->Aportes->newEntity();
        if ($this->request->is('post')) {
            $aporte = $this->Aportes->patchEntity($aporte, $this->request->getData());
            if ($this->Aportes->save($aporte)) {
                $this->Flash->success(__('El aporte ha sido registrado con exito.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('El aporte no se puedo registrar.'));
        }
        $this->set(compact('aporte'));
    }

     public function mp($monto)
    {

        MercadoPago\SDK::setClientId("7261628270430202");
        MercadoPago\SDK::setClientSecret("l4QDNZqgIrBcKa4fg9ZYvLdsh9PYb9Bf");

        # Create a preference object
        $preference = new MercadoPago\Preference();
        # Create an item object
        $item = new MercadoPago\Item();
        $item->id = "1234";
        $item->title = "Cooperativa Utn La Plata";
        $item->quantity = 1;
        $item->currency_id = "ARS";
        $item->unit_price = $monto;
        # Create a payer object
        $payer = new MercadoPago\Payer();
        //$payer->email = "cary@yahoo.com";
        # Setting preference properties
        $preference->items = array($item);
        $preference->payer = $payer;
        # Save and posting preference
        $preference->save();

        $this->redirect("$preference->init_point");
    }

    /**
     * View method
     *
     * @param string|null $id Aporte id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $aporte = $this->Aportes->get($id, [
            'contain' => []
        ]);

        $this->set('aporte', $aporte);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $aporte = $this->Aportes->newEntity();
        if ($this->request->is('post')) {
            $aporte = $this->Aportes->patchEntity($aporte, $this->request->getData());
            if ($this->Aportes->save($aporte)) {
                $this->Flash->success(__('El aporte ha sido registrado con exito.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('El aporte no se puedo registrar.'));
        }
        $this->set(compact('aporte'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Aporte id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $aporte = $this->Aportes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $aporte = $this->Aportes->patchEntity($aporte, $this->request->getData());
            if ($this->Aportes->save($aporte)) {
                $this->Flash->success(__('El aporte ha sido registrado con exito.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('El aporte no se puedo registrar.'));
        }
        $this->set(compact('aporte'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Aporte id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $aporte = $this->Aportes->get($id);
        if ($this->Aportes->delete($aporte)) {
            $this->Flash->success(__('El aporte ha sido eliminado con exito.'));
        } else {
            $this->Flash->error(__('El aporte no ha podido ser eliminado.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
