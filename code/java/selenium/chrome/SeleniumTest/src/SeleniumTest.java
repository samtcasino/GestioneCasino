import org.openqa.selenium.WebDriver;
import org.openqa.selenium.chrome.ChromeDriver;
import org.openqa.selenium.chrome.ChromeOptions;

public class SeleniumTest {

    public static void main(String[] args) {

        System.setProperty("webdriver.chrome.driver",
                "D:\\Programmi\\ChromeDriver\\chromedriver.exe");
        ChromeOptions options = new ChromeOptions();
        options.addArguments("headless");
        options.addArguments("window-size=1200x600");
        WebDriver driver = new ChromeDriver();
        driver.get("http://www.cashyland.tk");

        String titleText = driver.getTitle();
        System.out.println(titleText);

        //assertEquals("Neuron HTML CSS Template", titleText)

        driver.quit();

        SeleniumTestTest st = new SeleniumTestTest();
        st.testTitle("CashyLand - Home", titleText);

    }

}
