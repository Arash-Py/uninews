<?php

namespace App\Livewire\Admin\News;

use App\Models\News;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Component;

class Index extends Component
{
    public $title = 'لیست اخبار';

    #[Computed]
    public function news(){
        return News::orderByDesc('id')->get();
    }
    public function deleteNewsConfirm(News $news)
    {
        $this->dispatch('DeleteConfirm',
            title : "آیا از حذف خبر {$news->title} مطمئن هستید ؟",
            id : $news->id
        );
    }
    #[On('deleteNews')]
    public function deleteNews(News $news)
    {
        $news->delete();
        $this->dispatch('deleted',
            title : "حذف {$news->title}",
            text : 'با موفقیت انجام شد'
        );
    }
    public function render()
    {
        return view('livewire.admin.news.index')->layout('layout.master');
    }
}
