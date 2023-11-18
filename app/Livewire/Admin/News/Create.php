<?php

namespace App\Livewire\Admin\News;

use App\Models\News;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;
    public $page_title = 'ایحاد خبر جدید';
    public $title, $body, $pic;
    protected function rules()
    {
        return [
            'title' => 'required|string',
            'body' => 'required|string',
            'pic' => 'required|image'
        ];
    }
    public function createNews()
    {
        $this->validate();
        $data = [
            'title' => $this->title,
            'body' => $this->body,
        ];

        $news = News::create($data);
        $news->addMedia($this->pic)->toMediaCollection('pic');

        return to_route('admin.news.index');
    }
    public function render()
    {
        return view('livewire.admin.news.create')->layout('layout.master');
    }
}
