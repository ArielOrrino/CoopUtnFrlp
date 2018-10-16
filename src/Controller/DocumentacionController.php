<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Core\Configure;

/**
 * Documentacion Controller
 *
 * @property \App\Model\Table\DocumentacionTable $Documentacion
 *
 * @method \App\Model\Entity\Documentacion[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class DocumentacionController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $documentacion = $this->paginate($this->Documentacion);

        $this->set(compact('documentacion'));
    }

    /**
     * View method
     *
     * @param string|null $id Documentacion id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
   
    public function view($id = null)
    {
        $documentacion = $this->Documentacion->get($id, [
            'contain' => []
        ]);

        $this->set('documentacion', $documentacion);
    }
    

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $documentacion = $this->Documentacion->newEntity();
        if ($this->request->is('post')) {
            $documentacion = $this->Documentacion->patchEntity($documentacion, $this->request->getData());
            if ($this->Documentacion->save($documentacion)) {
                $this->Flash->success(__('La documentacion ha sido guardada con exito.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('La documentacion no pudo ser guardada.'));
        }
        $this->set(compact('documentacion'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Documentacion id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $documentacion = $this->Documentacion->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $documentacion = $this->Documentacion->patchEntity($documentacion, $this->request->getData());
            if ($this->Documentacion->save($documentacion)) {
                $this->Flash->success(__('La documentacion ha sido guardada con exito'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('La documentacion no pudo ser guardada.'));
        }
        $this->set(compact('documentacion'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Documentacion id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $documentacion = $this->Documentacion->get($id);
        if ($this->Documentacion->delete($documentacion)) {
            $this->Flash->success(__('La documentacion ha sido eliminada con exito'));
        } else {
            $this->Flash->error(__('La documentacion no ha podido ser eliminada.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function download($id) { 
                Configure::write('debug', 0); 
                $documentacion = $this->Documentacion->get($id, [
                     'contain' => []
                        ]);
                $this->set('documentacion', $documentacion);
                $file = $documentacion->factura;
 
           //    header('Content-Description: File Transfer');
               header('Content-Type: image/jpeg');
               header('Content-Type: image/png');
                // some people reported problems with this line (see the comments), commenting out this line helped in those cases 
                 header('Content-Disposition: attachment; filename='.stream_get_contents($documentacion->factura)); 
                //echo $documentacion;   
                ///WHEN I COMMENT THIS LINE .... ONLY FILE LOCATION (database) is PRINTED 

               // $this->set(compact($file,$nam));
               $this->response->file($documentacion->factura, array(
                'download' => true,
                'name' => stream_get_contents($documentacion->factura)
                 )); 
                return $this->response;
                //exit(); 
    }

 public function download1($id) { 
                Configure::write('debug', 1); 
                $documentacion = $this->Documentacion->get($id, [
                     'contain' => []
                        ]);
                //$this->set('documentacion', $documentacion);
                $file = $documentacion->factura;
                CakeLog::write('debug','Filename: '.json_encode($file));
            if(!empty($file)) {
                header('Content-Description: File Transfer');
                header('Content-Type: application/octet-stream');
                header('Content-Disposition: attachment; filename='.basename($file));
                header('Content-Transfer-Encoding: binary');
                header('Expires: 0');
                header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
                header('Pragma: public');
                header('Content-Length: ' . filesize($file));
                ob_clean();
                flush();
                readfile($file);
                CakeLog::write('debug', json_encode(readfile($path.DS.$file)));
                 exit;
    }
}
   public function viewdown($id=null) {

     Configure::write('debug', 1);
     $files=$this->Documentacion->get($id);

      $filename='prueba.png';
      //$name=explode('.',$filename);
      $this->viewClass = 'Media';

    $this->response->file($files, array(
        'download' => true,
        'name' => $filename
    ));
    header('Content-Disposition: attachment; filename=$nam');
    return $this->response;
     
      // path will be app/outsidefiles/yourfilename.pdf
      /*$params = array(
            'id'        => $filename,
            'name'      => $name[0],
            'path'      => APP . 'outsidefiles' . DS
        );
        
     $this->set($params);*/
    }
}