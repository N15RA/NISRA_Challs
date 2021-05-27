#include <stdio.h>
#include <unistd.h>

void win()
{
	puts("NISRA{0hh, y0u kn0w wh47 15 r3t2cod3}");
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