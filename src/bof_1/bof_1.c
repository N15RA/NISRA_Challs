#include <stdio.h>
#include <unistd.h>

void win()
{
	puts("NISRA{XXXXXXXXXXXXXXXX}");
}

void vuln()
{
	char buf[20];
	printf("Have you heard about ret2code?");
	gets(buf);
}

int main()
{
	setvbuf(stdin, NULL, _IONBF, 0);
	setvbuf(stdout, NULL, _IONBF, 0);

	vuln();
	return 0;
}