<?php

namespace App\Livewire\Admin\News;

use App\Models\News;
use Livewire\Component;

class Edit extends Component
{
    public $page_title = 'ویرایش خبر';
    public $title, $body;
    public $news;
    public function mount(News $news)
    {
        $this->news = $news;
        $this->fill(
            $news->syncOriginal()
        );
    }

    protected function rules()
    {
        return [
            'title' => 'required|string',
            'body' => 'required|string'
        ];
    }

    public function updateNews()
    {

        $validated = $this->validate();
        $this->validate();
        $this->news->update($validated);


        return to_route('admin.news.index');
    }

    public function render()
    {
        return view('livewire.admin.news.edit')->layout('layout.master');
    }
}
