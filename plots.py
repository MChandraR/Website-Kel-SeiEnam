import matplotlib.pyplot as plt

# Data
bulan = [
    "Januari", "Februari", "Maret", "April", "Mei", "Juni", 
    "Juli", "Agustus", "September", "Oktober", "November"
]
aroma_terjual = [14, 16, 11, 13, 12, 14, 11, 10, 13, 19, 12]

# Membuat plot
plt.figure(figsize=(10, 6))
plt.bar(bulan, aroma_terjual, color='skyblue', edgecolor='black')

# Menambahkan label dan judul
plt.xlabel("Bulan", fontsize=12)
plt.ylabel("Jumlah Aroma Terjual", fontsize=12)
plt.title("Visualisasi Penjualan Aroma per Bulan", fontsize=14)
plt.xticks(rotation=45)

# Menambahkan grid
plt.grid(axis='y', linestyle='--', alpha=0.7)

# Menampilkan plot
plt.tight_layout()
plt.show()
