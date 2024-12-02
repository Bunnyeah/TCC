from selenium import webdriver
import time
from selenium.webdriver.common.by import By
driver = webdriver.Chrome()

driver.get("http://localhost/aluno/TCC/TCC/cadastro.php")

driver.find_element(By.CSS_SELECTOR, "#nome").send_keys("Joao Mendez")
time.sleep(1)

driver.find_element(By.CSS_SELECTOR, "#email").send_keys("JoaoM@gmail.com")
time.sleep(1)

driver.find_element(By.CSS_SELECTOR, "#senha").send_keys("123")
time.sleep(1)

driver.find_element(By.CSS_SELECTOR, "#confirmsenha").send_keys("123")
time.sleep(1)

driver.find_element(By.CSS_SELECTOR, "#submit").click()
time.sleep(1)

driver.find_element(By.CSS_SELECTOR, "#email").send_keys("JoaoM@gmail.com")
time.sleep(1)

driver.find_element(By.CSS_SELECTOR, "#senha").send_keys("123")
time.sleep(1)

driver.find_element(By.CSS_SELECTOR, "#submit").click()
time.sleep(1)

driver.find_element(By.CSS_SELECTOR, "#logo > a > img").click()
time.sleep(1)

driver.find_element(By.CSS_SELECTOR, "#produtos-populares > div > div > div.div_botao > a").click()
time.sleep(1)

driver.find_element(By.CSS_SELECTOR, "#botaocarrinho").click()
time.sleep(1)