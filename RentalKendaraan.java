import java.util.Scanner;

class BarangRental {
    String noTNKB;
    String namaKendaraan;
    String jenisKendaraan;
    int tahun;
    int biayaSewa;

    BarangRental(String noTNKB, String namaKendaraan, String jenisKendaraan, int tahun, int biayaSewa) {
        this.noTNKB = noTNKB;
        this.namaKendaraan = namaKendaraan;
        this.jenisKendaraan = jenisKendaraan;
        this.tahun = tahun;
        this.biayaSewa = biayaSewa;
    }
}

    class TransaksiRental {
        int kodeTransaksi;
        String namaPeminjam;
        int lamaPinjam;
        double totalBiaya;
        BarangRental br;
        
        public TransaksiRental (String namaPeminjam, int lamaPinjam, BarangRental barang) {
        this.kodeTransaksi = kodeTransaksi;
        this.namaPeminjam = namaPeminjam;
        this.lamaPinjam = lamaPinjam;
        this.br = br;
        this.totalBiaya = totalBiaya;
    }
}

public class RentalKendaraan {
    static BarangRental[] barangRental = {
        new BarangRental("S 4567 YV", "Honda Beat", "Motor", 2017, 10000),
        new BarangRental("N 4511 VS", "Honda Vario", "Motor", 2018, 10000),
        new BarangRental("N 1453 AA", "Toyota Yaris", "Mobil", 2022, 30000),
        new BarangRental("AB 4321 A", "Toyota Innova", "Mobil", 2019, 60000),
        new BarangRental("B 1234 AG", "Toyota Avanza", "Mobil", 2021, 25000)
    };
    static TransaksiRental[] transaksiRentals = new TransaksiRental[0];

    static void showBarangRental() {
        System.out.println("++++++++++++++++++++++++++++++++++++++");
        System.out.println("Daftar Kendaraan Rental Serba Serbi");
        System.out.println("++++++++++++++++++++++++++++++++++++++");
        for (BarangRental barangRental : barangRental) {
            System.out.println(barangRental.noTNKB + " " + barangRental.namaKendaraan + " " + barangRental.jenisKendaraan + " " + barangRental.tahun + " " + barangRental.biayaSewa);
        }
    }

    static void peminjamBarangRental(Scanner scanner) {
        System.out.println("------------------------------------");
        System.out.println("       Masukkan Data Peminjaman");
        System.out.println("------------------------------------");
        System.out.print("Masukkan Nama Peminjam: ");
        String namaPeminjam = scanner.next();
        System.out.println("Masukkan Nomer TNKB : ");
        int noTNKB = scanner.nextInt();
        System.out.print("Masukkan lama pinjam (dalam jam): ");
        int lamaPinjam = scanner.nextInt();
        double totalBiaya = calculateTotalBiaya(barangRental[0], lamaPinjam);
        TransaksiRental transaksiRental = new TransaksiRental(namaPeminjam, lamaPinjam, barangRental[0]);
        transaksiRentals = addTransaksiRental(transaksiRentals, transaksiRental);
        System.out.println("Transaksi berhasil diterima!");
    }

    static void showTransaksiRental() {
        System.out.println("Daftar Transaksi Peminjaman Rental Serba Serbi");
        for (TransaksiRental transaksiRental : transaksiRentals) {
            System.out.println(transaksiRental.kodeTransaksi + " " + transaksiRental.br.noTNKB + " " + transaksiRental.namaPeminjam + " " + transaksiRental.lamaPinjam + " " + transaksiRental.totalBiaya);
        }
    }

    static void sortTransaksiRental() {
        for (int i = 0; i < transaksiRentals.length - 1; i++) {
            for (int j = i + 1; j < transaksiRentals.length; j++) {
                if (transaksiRentals[i].br.namaKendaraan.compareTo(transaksiRentals[j].br.namaKendaraan) > 0) {
                    TransaksiRental temp = transaksiRentals[i];
                    transaksiRentals[i] = transaksiRentals[j];
                    transaksiRentals[j] = temp;
                }
            }
        }
        showTransaksiRental();
    }

    static double calculateTotalBiaya(BarangRental barangRental, int lamaPinjam) {
        double totalBiaya = barangRental.biayaSewa * lamaPinjam;
        if (lamaPinjam > 78) {
            totalBiaya *= 0.8;
        } else if (lamaPinjam > 48) {
            totalBiaya *= 0.9;
        }
        return totalBiaya;
    }

    static TransaksiRental[] addTransaksiRental(TransaksiRental[] transaksiRentals, TransaksiRental transaksiRental) {
        TransaksiRental[] newTransaksiRental = new TransaksiRental[transaksiRentals.length + 1];
        System.arraycopy(transaksiRentals, 0, newTransaksiRental, 0, transaksiRentals.length);
        newTransaksiRental[transaksiRentals.length] = transaksiRental;
        return newTransaksiRental;
    }

    public static void main(String[] args) throws Exception{
            Scanner sc = new Scanner(System.in);
            int menu;
    
            while (true) {
                System.out.println("Menu ");
                System.out.println("1. Daftar Kendaraan");
                System.out.println("2. Peminjaman");
                System.out.println("3. Tampilkan Seluruh Transaksi");
                System.out.println("4. Urutkan Transaksi Urut no TNKB");
                System.out.println("5. Exit");
                System.out.print("Pilih (1-5): ");
                menu = sc.nextInt();
    
                switch (menu) {
                    case 1:
                        showBarangRental();
                        break;
                    case 2:
                        peminjamBarangRental(sc);
                        break;
                    case 3:
                        showTransaksiRental();
                        break;
                    case 4:
                        sortTransaksiRental();
                        break;
                    case 5:
                        System.out.println("Terimakasih telah menggunakan program ini.");
                        sc.close();
                        return;
                    default:
                        System.out.println("Pilihan tidak valid.");
                        break;
            }
        }
    }
}