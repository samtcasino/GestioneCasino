import org.junit.jupiter.api.Test;
import org.openqa.selenium.By;
import org.openqa.selenium.Keys;
import org.openqa.selenium.WebDriver;
import org.openqa.selenium.WebElement;
import org.openqa.selenium.chrome.ChromeDriver;
import org.openqa.selenium.chrome.ChromeOptions;

import static org.junit.jupiter.api.Assertions.assertEquals;

class SeleniumUpdateUserTestTest {
    private String URL = "http://cashyland.tk/";
    private WebDriver driver = null;
    private WebElement nome;
    private WebElement cognome;
    private WebElement dataNascita;
    private WebElement via;
    private WebElement noCivico;
    private WebElement cap;
    private WebElement citta;
    private WebElement telefono;

    void accedi(){
        WebElement accedi = null;
        accedi = driver.findElement(By.linkText("Accedi"));
        accedi.click();
        waitMillis(1000);
        System.out.println(driver.getTitle());
        assertEquals("CashyLand - Login",driver.getTitle());
    }

    void insertEmail(String email){
        WebElement indirizzoEmail = driver.findElement(By.id("email"));
        indirizzoEmail.sendKeys(email);
    }

    void insertPassword(String password){
        WebElement pass = driver.findElement(By.id("password"));
        pass.sendKeys(password);
    }

    void pressLoginButton(){
        WebElement registrati = null;
        registrati = driver.findElement(By.id("submit"));
        registrati.click();
        waitMillis(1000);
    }

    void pressUpdateButton(){
        WebElement update = null;
        update = driver.findElement(By.id("modifyInformation"));
        update.click();
        waitMillis(1000);
    }

    void pressUpdateUserButton(){
        WebElement update = null;
        update = driver.findElement(By.id("button-login"));
        update.click();
        waitMillis(1000);
    }

    void insertName(String name){
        nome = driver.findElement(By.id("firstname"));
        nome.sendKeys(name);
    }

    void insertSurname(String surname){
        cognome = driver.findElement(By.id("surname"));
        cognome.sendKeys(surname);
    }

    void insertBirthday(String birthday){
        dataNascita = driver.findElement(By.id("birthday"));
        dataNascita.sendKeys(birthday);
    }

    void insertAddress(String address){
        via = driver.findElement(By.id("address"));
        via.sendKeys(address);
    }

    void insertHouseNumber(String houseNumber){
        noCivico = driver.findElement(By.id("houseNumber"));
        noCivico.sendKeys(houseNumber);
    }

    void insertZipCode(String zipCode){
        cap = driver.findElement(By.id("zipCode"));
        cap.sendKeys(zipCode);
    }

    void insertCity(String city){
        citta = driver.findElement(By.id("city"));
        citta.sendKeys(city);
    }

    void insertPhoneNumber(String phoneNumber){
        telefono = driver.findElement(By.id("phoneNumber"));
        telefono.sendKeys(phoneNumber);
    }

    void clearInputs(){
        nome.clear();
        cognome.clear();
        dataNascita.sendKeys(Keys.CLEAR);
        via.clear();
        noCivico.clear();
        cap.clear();
        citta.clear();
        telefono.clear();
    }

    void testTextInputs(String text, String input){
        insertBirthday("12.12.2000");
        insertHouseNumber("982");
        insertZipCode("8999");
        insertPhoneNumber("0798887766");
        insertPassword("iuciuvhsd98ds98HBHB989");
        if(input.equalsIgnoreCase("name")){
            insertSurname("Test");
            insertCity("Lugano");
            insertAddress("via test di selenium");
            insertName(text);
        }else if(input.equalsIgnoreCase("surname")){
            insertName("Selenium");
            insertCity("Lugano");
            insertAddress("via test di selenium");
            insertSurname(text);
        }else if(input.equalsIgnoreCase("city")){
            insertSurname("Test");
            insertName("Selenium");
            insertAddress("via test di selenium");
            insertCity(text);
        }else if(input.equalsIgnoreCase("address")){
            insertSurname("Test");
            insertCity("Lugano");
            insertName("Selenium");
            insertAddress(text);
        }
        pressUpdateButton();
        clearInputs();
    }

    void testBirthday(String birthday){
        insertName("Selenium");
        insertSurname("Test");
        insertBirthday(birthday);
        insertAddress("via test di selenium");
        insertHouseNumber("982");
        insertZipCode("8999");
        insertCity("Lugano");
        insertPhoneNumber("0798887766");
        pressUpdateButton();
        clearInputs();
    }

    void testHouseNumber(String houseNumber){
        insertName("Selenium");
        insertSurname("Test");
        insertBirthday("12.12.2000");
        insertAddress("via test di selenium");
        insertHouseNumber(houseNumber);
        insertZipCode("8999");
        insertCity("Lugano");
        insertPhoneNumber("0798887766");
        pressUpdateButton();
        clearInputs();
    }

    void testZipCode(String zipCode){
        insertName("Selenium");
        insertSurname("Test");
        insertBirthday("12.12.2000");
        insertAddress("via test di selenium");
        insertHouseNumber("10");
        insertZipCode(zipCode);
        insertCity("Lugano");
        insertPhoneNumber("0798887766");
        pressUpdateButton();
        clearInputs();
    }

    void testPhoneNumber(String phoneNumber){
        insertName("Selenium");
        insertSurname("Test");
        insertBirthday("12.12.2000");
        insertAddress("via test di selenium");
        insertHouseNumber("10");
        insertZipCode("9876");
        insertCity("Lugano");
        insertPhoneNumber(phoneNumber);
        pressUpdateUserButton();
        clearInputs();
    }

    @Test
    void test(){
        System.setProperty("webdriver.chrome.driver","/usr/bin/chromedriver");
        ChromeOptions options = new ChromeOptions();
        options.addArguments("--headless");
        options.addArguments("--no-sandbox");
        options.addArguments("--remote-debugging-port=9222");
        driver = new ChromeDriver(options);
        driver.get(URL);

        waitMillis(1000);

        assertEquals("CashyLand - Home",driver.getTitle());
        accedi();
        insertEmail("matteo.forni@samtrevano.ch");
        insertPassword("SeleniumTest&1");
        pressLoginButton();

        waitMillis(1000);

        pressUpdateButton();
        assertEquals("CashyLand - MyAccount",driver.getTitle());

        /*Test name*/
        testTextInputs("aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa", "name");
        testTextInputs("21","name");
        testTextInputs("S£l£nium~","name");
        assertEquals("CashyLand - Registrazione",driver.getTitle());
        System.out.println("NAME OK");

        /*Test surname*/
        testTextInputs("aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa", "surname");
        testTextInputs("21","surname");
        testTextInputs("S£l£nium~","surname");
        assertEquals("CashyLand - Registrazione",driver.getTitle());
        System.out.println("SURNAME OK");

        /*Test birthday*/
        testBirthday("31.02.2010");
        testBirthday("12.12.5000");
        assertEquals("CashyLand - Registrazione",driver.getTitle());
        System.out.println("BIRTHDAY OK");

        /*Test address*/
        testTextInputs("aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa", "address");
        testTextInputs("21","address");
        testTextInputs("S£l£nium~","address");
        assertEquals("CashyLand - Registrazione",driver.getTitle());
        System.out.println("ADDRESS OK");

        /*Test HouseNumber*/
        testHouseNumber("jasnd");
        testHouseNumber("7834548547583475419753947147171717147247");
        testHouseNumber("8!$");
        assertEquals("CashyLand - Registrazione",driver.getTitle());
        System.out.println("HOUSENUMBER OK");

        /*Test ZipCode*/
        testZipCode("jasnd");
        testZipCode("7834548547583475419753947147171717147247");
        testZipCode("8!$");
        assertEquals("CashyLand - Registrazione",driver.getTitle());
        System.out.println("ZIPCODE OK");

        /*Test city*/
        testTextInputs("aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa", "city");
        testTextInputs("21","city");
        testTextInputs("S£l£nium~","city");
        assertEquals("CashyLand - Registrazione",driver.getTitle());
        System.out.println("CITY OK");

        /*Test PhoneNumber*/
        testPhoneNumber("9238-12+12");
        testPhoneNumber("7834548547583475419753947147171717147247");
        testPhoneNumber("qwdxsas");
        assertEquals("CashyLand - Registrazione",driver.getTitle());
        System.out.println("PHONENUMBER OK");
    }

    public void waitMillis(int millis) {
        try {
            Thread.sleep(millis);
        } catch (InterruptedException e) {
            e.printStackTrace();
        }
    }
}