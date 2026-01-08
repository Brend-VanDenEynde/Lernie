<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\NewsPost;
use App\Models\FaqQuestion;
use App\Models\FaqCategory;
use App\Models\Contact;
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

    public function promoteToAdmin(User $user)
    {
        if ($user->role === 'admin') {
            return back()->with('error', 'Gebruiker is al een admin.');
        }

        $user->update(['role' => 'admin']);
        return back()->with('success', 'Gebruiker is nu admin.');
    }

    public function demoteFromAdmin(User $user)
    {
        if ($user->role !== 'admin') {
            return back()->with('error', 'Gebruiker is geen admin.');
        }

        // Prevent demoting yourself
        if ($user->id === auth()->id()) {
            return back()->with('error', 'Je kunt jezelf niet degraderen.');
        }

        $user->update(['role' => 'student']);
        return back()->with('success', 'Admin rechten ingetrokken. Gebruiker is nu een student.');
    }

    public function createUser()
    {
        return view('admin.users.create');
    }

    public function storeUser(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|confirmed',
            'role' => 'required|in:student,tutor,admin',
        ]);

        $validated['password'] = bcrypt($validated['password']);
        User::create($validated);

        return redirect()->route('admin.users.index')->with('success', 'Gebruiker succesvol aangemaakt.');
    }

    public function deleteUser(User $user)
    {
        // Prevent deleting yourself
        if ($user->id === auth()->id()) {
            return back()->with('error', 'Je kunt jezelf niet verwijderen.');
        }

        $user->delete();
        return redirect()->route('admin.users.index')->with('success', 'Gebruiker verwijderd.');
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

    public function contacts()
    {
        $contacts = Contact::latest()->get();
        return view('admin.contacts.index', compact('contacts'));
    }

    public function showContact(Contact $contact)
    {
        // Mark as read when admin views it
        if (!$contact->is_read) {
            $contact->update(['is_read' => true]);
        }
        
        return view('admin.contacts.show', compact('contact'));
    }

    public function destroyContact(Contact $contact)
    {
        $contact->delete();
        return redirect()->route('admin.contacts.index')->with('success', 'Contactbericht verwijderd.');
    }
}
