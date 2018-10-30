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

    public $paginate = [
        'limit' => 2550
    ];

    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('Paginator');
    }

    public function index()
    {
        $aportes = $this->paginate($this->Aportes);
        $this->set(compact('aportes'));

        $idaportes = $this->request->getData('busqaporte');
        $aporte2 = $this->Aportes->newEntity();
        $aporte2 = $this->Aportes->find('all')->where(['Aportes.idaportes' => $idaportes])->first();
        $this->set(compact('aporte2'));

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

    public function confirm1()
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

        MercadoPago\SDK::setClientId("2771105279269347");
        MercadoPago\SDK::setClientSecret("9lxEDkQYJIsHIQ13Iw4mVjbG8Z2O91f6");

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
        $preference->back_urls = array(
          //"success" => $this->redirect('aportes/recibo'),
         "success" => "http://localhost:8765/aportes/addmp/$monto",
         "failure" => "http://localhost:8765/aportes/confirm1/$monto",
         "pending" => "http://www.tu-sitio/pending"
        );
        $preference->auto_return = "approved";
        //$payer->email = "cary@yahoo.com";
        # Setting preference properties
        $preference->items = array($item);
        $preference->payer = $payer;
        # Save and posting preference
        $preference->save();
        $this->redirect("$preference->sandbox_init_point");
        // $this->redirect("$preference->init_point");
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

                return $this->redirect(array('action' => 'recibo', $aporte->idaportes));

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

    public function recibo($id = null)
    {
       $aporte = $this->Aportes->get($id, [
            'contain' => []
        ]);

        $this->set('aporte', $aporte);
    }

    public function addmp($monto = null)
     {
        $aporte = $this->Aportes->newEntity();
        $aporte->monto = $monto;
        date_default_timezone_set("America/Argentina/Buenos_Aires");
        $now = date('Y-m-d H:i:s',Time());
        $aporte->fecha_aporte = $now;
        $this->Aportes->save($aporte);
        return $this->redirect(array('action' => 'recibo', $aporte->idaportes));
    }

}
