<?php
declare(strict_types=1);

namespace App\Controller;

class CharacteristicsController extends AppController
{
    public function index()
    {
        $characteristics = $this->paginate($this->Characteristics);

        $this->set(compact('characteristics'));
    }

    public function view($id = null)
    {
        $characteristic = $this->Characteristics->get($id, [
            'contain' => ['Users'],
        ]);

        $this->set(compact('characteristic'));
    }

    public function add()
    {
        $characteristic = $this->Characteristics->newEmptyEntity();
        if ($this->request->is('post')) {
            $characteristic = $this->Characteristics->patchEntity($characteristic, $this->request->getData());
            if ($this->Characteristics->save($characteristic)) {
                $this->Flash->success(__('The characteristic has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The characteristic could not be saved. Please, try again.'));
        }
        $users = $this->Characteristics->Users->find('list', ['limit' => 200]);
        $this->set(compact('characteristic', 'users'));
    }

    public function edit($id = null)
    {
        $characteristic = $this->Characteristics->get($id, [
            'contain' => ['Users'],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $characteristic = $this->Characteristics->patchEntity($characteristic, $this->request->getData());
            if ($this->Characteristics->save($characteristic)) {
                $this->Flash->success(__('The characteristic has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The characteristic could not be saved. Please, try again.'));
        }
        $users = $this->Characteristics->Users->find('list', ['limit' => 200]);
        $this->set(compact('characteristic', 'users'));
    }

    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $characteristic = $this->Characteristics->get($id);
        if ($this->Characteristics->delete($characteristic)) {
            $this->Flash->success(__('The characteristic has been deleted.'));
        } else {
            $this->Flash->error(__('The characteristic could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
