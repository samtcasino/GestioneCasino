package test;

import static org.junit.jupiter.api.Assertions.*;

import java.io.File;

import org.junit.jupiter.api.Test;
import org.openqa.selenium.By;
import org.openqa.selenium.WebDriver;
import org.openqa.selenium.WebElement;
import org.openqa.selenium.chrome.ChromeDriver;
import org.openqa.selenium.phantomjs.PhantomJSDriver;

class TLinkPaginaBenvenuto {

	String URL = "http://cashyland.tk/";
	
	@Test
	void test() {
		File file = new File("C:\\Users\\Utente\\Desktop\\Tutto\\2018-19\\modulo 306\\Utility\\Progetto 3\\phantomjs-2.1.1-windows\\bin\\phantomjs.exe");	
		System.setProperty("phantomjs.binary.path", file.getAbsolutePath());	
		//System.setProperty("webdriver.chrome.driver","C:\\Program Files (x86)\\Google\\Chrome\\Application\\chromedriver.exe");
		
		WebDriver driver = new PhantomJSDriver();
		//WebDriver driver = new ChromeDriver();
		WebElement accedi = null;
		WebElement registrati = null;
		WebElement forget = null;
		WebElement casa = null;
		
		driver.get(URL);
		wai();
		System.out.println(driver.getTitle());
		assertEquals("CashyLand - Home",driver.getTitle());
		
		accedi = driver.findElement(By.linkText("Accedi"));
        accedi.click();
        wai();
        System.out.println(driver.getTitle());
        assertEquals("GestioneCasino - Login",driver.getTitle());
        
        registrati = driver.findElement(By.name("register"));
        registrati.click();
        wai();
        System.out.println(driver.getTitle());
        assertEquals("GestioneCasino - Registrazione",driver.getTitle());
        
        accedi = driver.findElement(By.linkText("Accedi"));
        accedi.click();
        wai();
        System.out.println(driver.getTitle());
        assertEquals("GestioneCasino - Login",driver.getTitle());
        
        forget = driver.findElement(By.linkText("Hai dimenticato la password?"));
        forget.click();
        wai();
        System.out.println(driver.getTitle());
        assertEquals("GestioneCasino - Password Smarrita?",driver.getTitle());
        
        accedi = driver.findElement(By.linkText("Accedi"));
        accedi.click();
        wai();
        System.out.println(driver.getTitle());
        assertEquals("GestioneCasino - Login",driver.getTitle());
        
        casa = driver.findElement(By.linkText("Home"));
        casa.click();
        wai();
        System.out.println(driver.getTitle());
        assertEquals("CashyLand - Home",driver.getTitle());
        
        System.out.println("OK");
        
        driver.quit();
    }
	
	public void wai() {
		try {
			Thread.sleep(1000);
		} catch (InterruptedException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
	}

}
