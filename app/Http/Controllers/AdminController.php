<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\NewsPost;
use App\Models\FaqQuestion;
use App\Models\FaqCategory;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function users()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    public function showUser(User $user)
    {
        return view('admin.users.show', compact('user'));
    }

    public function articles()
    {
        $articles = NewsPost::latest()->get();
        return view('admin.articles.index', compact('articles'));
    }

    public function createArticle()
    {
        return view('admin.articles.create');
    }

    public function storeArticle(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|url', // Assuming image is a URL for now or file upload logic needed later
            'published_at' => 'nullable|date',
        ]);

        if (empty($validated['published_at'])) {
             $validated['published_at'] = now();
        }

        NewsPost::create($validated);

        return redirect()->route('admin.articles.index')->with('success', 'Artikel succesvol aangemaakt.');
    }

    public function editArticle(NewsPost $article)
    {
        return view('admin.articles.edit', compact('article'));
    }

    public function updateArticle(Request $request, NewsPost $article)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|url',
            'published_at' => 'nullable|date',
        ]);

        if (empty($validated['published_at'])) {
             $validated['published_at'] = now();
        }

        $article->update($validated);

        return redirect()->route('admin.articles.index')->with('success', 'Artikel succesvol bijgewerkt.');
    }

    public function destroyArticle(NewsPost $article)
    {
        $article->delete();
        return redirect()->route('admin.articles.index')->with('success', 'Artikel verwijderd.');
    }

    public function faq()
    {
        $faqs = FaqQuestion::with('category')->get();
        return view('admin.faq.index', compact('faqs'));
    }

    public function createFaq()
    {
        $categories = FaqCategory::all();
        return view('admin.faq.create', compact('categories'));
    }

    public function storeFaq(Request $request)
    {
        $validated = $request->validate([
            'question' => 'required|string|max:255',
            'answer' => 'required|string',
            'faq_category_id' => 'required|exists:faq_categories,id',
        ]);

        FaqQuestion::create($validated);

        return redirect()->route('admin.faq.index')->with('success', 'FAQ succesvol aangemaakt.');
    }

    public function editFaq(FaqQuestion $faq)
    {
        $categories = FaqCategory::all();
        return view('admin.faq.edit', compact('faq', 'categories'));
    }

    public function updateFaq(Request $request, FaqQuestion $faq)
    {
        $validated = $request->validate([
            'question' => 'required|string|max:255',
            'answer' => 'required|string',
            'faq_category_id' => 'required|exists:faq_categories,id',
        ]);

        $faq->update($validated);

        return redirect()->route('admin.faq.index')->with('success', 'FAQ succesvol bijgewerkt.');
    }

    public function destroyFaq(FaqQuestion $faq)
    {
        $faq->delete();
        return redirect()->route('admin.faq.index')->with('success', 'FAQ verwijderd.');
    }

    public function faqCategories()
    {
        $categories = FaqCategory::all();
        return view('admin.faq.categories.index', compact('categories'));
    }

    public function createFaqCategory()
    {
        return view('admin.faq.categories.create');
    }

    public function storeFaqCategory(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:faq_categories,name',
        ]);

        FaqCategory::create($validated);

        return redirect()->route('admin.faq.categories.index')->with('success', 'Categorie succesvol aangemaakt.');
    }
}
