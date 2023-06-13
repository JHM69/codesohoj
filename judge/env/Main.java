import java.util.Scanner;

public class Main {
    public static void main(String[] args) {
        Scanner scanner = new Scanner(System.in);
        int t = scanner.nextInt();

        while (t-- > 0) {
            int x = scanner.nextInt();
            int result = 2 * x;
            System.out.println(result);
        }

        scanner.close();
    }
}
