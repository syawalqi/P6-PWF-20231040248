# Dokumentasi Penugasan Pertemuan 7: Component Berjalan

**Nama:** [Input Nama Anda]
**NIM:** [Input NIM Anda]
**Mata Kuliah:** Pemrograman Web Framework (PWF)

---

## 1. Pendahuluan
Pada pertemuan ini, kita mempelajari konsep **Blade Components** di Laravel. Component memungkinkan kita untuk membuat potongan UI yang dapat digunakan kembali (reusable), sehingga kode menjadi lebih bersih dan mudah dipelihara.

Tujuan dari penugasan ini adalah mengimplementasikan component untuk tombol **Add Product**, **Edit**, dan **Delete**.

## 2. Implementasi Component

### A. Component: AddProduct
Component ini digunakan untuk menampilkan tombol tambah item dengan ikon plus.

**File Class:** `app/View/Components/AddProduct.php`
```php
public function __construct(string $url, string $name)
{
    $this->url = $url;
    $this->name = $name;
}
```

**File View:** `resources/views/components/add-product.blade.php`
Menggunakan styling Indigo dan ikon SVG plus.

**Penggunaan di List Product:**
```html
<x-add-product :url="route('product.create')" :name="'Product'"/>
```

---

### B. Component: EditButton (Penugasan)
Component ini digunakan untuk tombol edit pada halaman detail produk.

**File Class:** `app/View/Components/EditButton.php`
**File View:** `resources/views/components/edit-button.blade.php`
Menggunakan styling Amber/Orange sesuai dengan referensi desain.

**Penggunaan di Detail Product:**
```html
<x-edit-button :url="route('product.edit', $product)" />
```

---

### C. Component: DeleteButton (Penugasan)
Component ini mengabstraksi form penghapusan beserta token CSRF dan method DELETE.

**File Class:** `app/View/Components/DeleteButton.php`
**File View:** `resources/views/components/delete-button.blade.php`
Menggunakan styling Red dan menyertakan konfirmasi `onsubmit` demi keamanan.

**Penggunaan di Detail Product:**
```html
<x-delete-button :url="route('product.delete', $product->id)" />
```

---

## 3. Hasil Integrasi
Berikut adalah perubahan yang dilakukan pada view:

1.  **Halaman Index (`resources/views/product/index.blade.php`)**:
    Tombol "Add Product" manual diganti dengan `<x-add-product>`.

2.  **Halaman View (`resources/views/product/view.blade.php`)**:
    Tombol "Edit" dan "Delete" manual diganti dengan `<x-edit-button>` dan `<x-delete-button>`.

## 4. Kesimpulan
Dengan menggunakan component, kita berhasil:
- Mengurangi pengulangan kode (DRY - Don't Repeat Yourself).
- Mempermudah perubahan desain di masa depan (Cukup ubah di satu file component).
- Meningkatkan keterbacaan kode pada file view utama.

---
*Dokumen ini dibuat secara otomatis sebagai laporan penyelesaian Tugas 7.*
