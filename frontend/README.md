# Babiel

## Extension (Backend)

You need to copy all out of /extension into /typo3conf/ext/babiel_core 

## Frontend

### Setup

Make sure to install the dependencies:

```bash
cd frontend

pnpm install
```

### Development

Start teh development server http://localhost:3000

```bash
pnpm run dev
```


### Production

Build the application for production:

```bash
# pnpm
pnpm run build
```

Locally preview production build:

```bash
# pnpm
pnpm run preview
```

## Helpful information

- Typo3-Nuxt [Docs](https://t3headless.macopedia.io/nuxt-typo3/introduction)
- Typo3-Nuxt [Deployment](https://nuxt.com/docs/getting-started/deployment)
- Typo3 [Create a custom element type](https://docs.typo3.org/m/typo3/reference-coreapi/12.4/en-us/ApiOverview/ContentElements/AddingYourOwnContentElements.html#ConfigureCE-Fields)


