#include <stdio.h>
#include <stdlib.h>
#include <unistd.h>
#include <stdint.h>

char name[100];

void unbuffer_io()
{
    setvbuf(stdin, NULL, _IONBF, 0);
    setvbuf(stdout, NULL, _IONBF, 0);
}

void set_timeout()
{
    alarm(120);
}

void getName()
{
	printf("Please enter your name:");
	scanf("%30s", name);
}

void menuMsg()
{
	printf("Welcome to sum array program!\n");
	printf("User: %s\n", name);
	puts("");
	printf("[1] Watch the arrays\n");
	printf("[2] Edit index\n");
	printf("[3] Watch index\n");
	printf("[4] Sum up\n");
	printf("[0] Exit\n");
}

void call_me()
{
	system("sh");
}

void start()
{
	int opt = -1, arr[10];
	uint32_t idx;
	while(1)
	{
		if(opt == -1)
			menuMsg();

		printf("\n>>");
		scanf("%d", &opt);

		switch(opt)
		{
			case -1:
			break;

			case 0:
				puts("Bye~");
				return;
			case 1:
				putchar('\n');
				for(int i = 0; i < 10; i++)
				{
					printf("arr[%d] = %d\n", i, arr[i]);
				}
			break;

			case 2:
			{
				int val = 0;
				putchar('\n');
				printf("Enter index:");
				scanf("%u", &idx);
				printf("\nEnter val:");
				scanf("%d", &val);

				arr[idx] = val;
				opt = -1;
			}
			break;

			case 3:
			{
				putchar('\n');
				printf("Enter index:");
				scanf("%u", &idx);
				menuMsg();
				printf("\narr[%d] = %d\n", idx, arr[idx]);
			}
			break;

			case 4:
			{
				int sum = 0;
				for(int i = 0; i < 10; i++)
					sum += arr[i];
				printf("\nSum = %d\n", sum);
			}
			break;
			
			default:
				printf("\nInvalid option\n");
			break;
		}
	}
}

int main()
{
	set_timeout();
	unbuffer_io();
	getName();
	start();

	return 0;
}