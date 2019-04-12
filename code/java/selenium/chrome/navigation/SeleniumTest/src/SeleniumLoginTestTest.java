import org.junit.jupiter.api.Test;
import org.openqa.selenium.By;
import org.openqa.selenium.WebDriver;
import org.openqa.selenium.WebElement;

import static org.junit.jupiter.api.Assertions.*;

class SeleniumLoginTestTest {
    private String URL = "http://cashyland.tk/";
    private WebDriver driver = null;

    void accedi(){
        WebElement accedi = null;
        accedi = driver.findElement(By.linkText("Accedi"));
        accedi.click();
        waitMillis(1000);
        System.out.println(driver.getTitle());
        assertEquals("GestioneCasino - Login",driver.getTitle());
    }

    @Test
    void test() {

    }

    public void waitMillis(int millis) {
        try {
            Thread.sleep(millis);
        } catch (InterruptedException e) {
            e.printStackTrace();
        }
    }
}