<?php

namespace App\Livewire;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Http;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithoutUrlPagination;



class ApiNpdDprdList extends Component
{
    //use WithPagination, WithoutUrlPagination;
    //protected $paginationTheme = 'bootstrap';

    public $perpage = 5;
    public $search = '';

    public $currentPage = 1;


    public function render()
    {
        $apiUrl = env('API_DOMAIN').'/api/v1/npd-dprd';
        $bearerToken = '1|x0mu02xVoEGcXQM760UUiPLJkt7B6zDjloDtrOgE0c22e6c0';


        $response = Http::withToken($bearerToken)->get($apiUrl, [
            'search' => $this->search,
        ]);

        if ($response->successful() && isset($response->json()['status'])){
            //cek jika status false
            $status = $response->json()['status'];
            if ($status==false){
                $this->dispatch('api-ditolak');
            }
        }

        if ($response->successful() && isset($response->json()['data'])) {
            $data = $response->json()['data'];
            $dataCollection = collect($data);

            $items = $dataCollection->slice(($this->currentPage - 1) * $this->perpage, $this->perpage)->all();

            $paginatedData = new LengthAwarePaginator(
                $items,
                $dataCollection->count(),
                $this->perpage,
                $this->currentPage,
                ['path' => request()->url(), 'query' => request()->query()]
            );

            return view('livewire.api-npd-dprd-list', ['datas' => $paginatedData]);

        } else {

            return view('livewire.api-npd-dprd-list', ['datas' => null]);
        }
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }


    public function previousPage()
    {
        if ($this->currentPage > 1) {
            $this->currentPage--;
        }
    }

    // Method to navigate to the next page
    public function nextPage()
    {
        $this->currentPage++;
    }

    public function gotoPage($pageNumber)
    {
        $this->currentPage = $pageNumber;

    }
}
